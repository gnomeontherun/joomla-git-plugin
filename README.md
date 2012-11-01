# Joomla Git Plugin

This is a work in progress, but if you are tracking your Joomla site in git, this plugin will automatically check for altered files and commit them onAfterRender. This is a rough draft, alpha release, so please treat it as such. It is not yet error tolerant and could use some love.

### Setup

Install as a normal Joomla plugin. Enable it in the Plugin Manager. Update the branch you wish to commit to, make sure the branch is already created! The plugin does not try to branch for you. You may need to update the git path if git is not available in the system path.

### Why?

Sometimes you just need to track the entire Joomla install with git, but once the site goes live the files can be easily modified and out of sync with the main repository. This allows you to auto-commit the changes into a separate branch, which you can then later merge.

Sometimes you also are only tracking some specific directories and this can also keep the changes in sync if they are changing on the site.

### License

GNU General Public License version 3 or later.