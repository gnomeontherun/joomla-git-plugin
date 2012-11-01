<?php
/**
 * @copyright	Copyright (C) 2012 Gnome on the run. All rights reserved.
 * @license		GNU General Public License version 3 or later
 */

defined('JPATH_BASE') or die;

// Load up the git library
require_once('lib/git.php');

/**
 * Keep Joomla install tracked with git.
 */
class plgSystemGit extends JPlugin
{
	public function onAfterRender()
	{
		// Setup variables
		$repo = new GitRepo(JPATH_ROOT);
		$repo->git_path = $this->params->get('git_path');
		$active_branch = $repo->active_branch();

		// Grab the status, which lists changed files
		$status = $repo->status();

		// If we get something, we have to process it.
		if ($status)
		{
			// Checkout the commit to branch if different from active one
			$commit_branch = trim($this->params->get('git_branch', ''));
			if ($commit_branch != '' && $commit_branch != $active_branch)
			{
				// Need to stash changes before we checkout
				$repo->stash('save');
				// Now its a clean repo checkout the branch
				$repo->checkout($this->params->get('git_branch'));
				// Revert stashed changes
				$repo->stash('pop');
			}

			// Commit the changes to the branch
			$message = str_replace('[date]', date('Y-m-d H:i:s'), $this->params->get('git_message', 'Automatic commit at [date]'));
			$repo->commit($message);
		}
	}
}
