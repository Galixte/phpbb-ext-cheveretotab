# phpbb-ext-cheveretotab
Extension phpBB 3.1, 3.2 & 3.3 - Chevereto tab on posting page

Description: This extention for phpBB 3.1.x, 3.2.x & 3.3.x adds a new tab on posting page to access to your Chevereto hosting website.

Official page: http://www.ezcom-fr.com/viewtopic.php?f=11&t=1084

## Quick Install
You can install this on the latest release of phpBB 3.1.3 by following the steps below:

1. [Download the latest release](https://git.ezcom-fr.com).
2. Unzip the downloaded release, and check if the main folder is named `ezcom` and the sub-folder `cheveretotab`.
3. In the `./ext/` directory of your phpBB board, put the main folder.
4. So, you have to have the `cheveretotab` folder inside the `./ext/ezcom/` directory of your phpBB board.
5. Edit `./ext/ezcom/cheveretotab/styles/prosilver/template/event/posting_editor_add_panel_tab.html`.
6. Replace `https://demo.chevereto.com/?lang=fr` with your Web address to your Chevereto hosting website.
7. Replace 3 times `Nom de son site Chevereto` with your Chevereto site name.
7. Navigate in the ACP to `Customise -> Manage extensions`.
6. Look for `Chevereto tab on posting page` under the Disabled Extensions list, and click its `Enable` link.


Remember to purge cache each time you edit the templates after the installation

## Uninstall

1. Navigate in the ACP to `Customise -> Extension Management -> Extensions`.
2. Look for `Chevereto tab on posting page` under the Enabled Extensions list, and click its `Disable` link.
3. To permanently uninstall, click `Delete Data` and then delete the `/ext/ezcom/cheveretotab` directory.

## Version History

- 2020.04.04

 - 1.0.0 : Initial release, stable version.
