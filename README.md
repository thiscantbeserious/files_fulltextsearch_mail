# files_fulltextsearch_mail

Add indexing of .eml files including body and header for NC 25.0.2

## Explanation of this Fork (Rebase)

Forked from a very old NC15 extension. Completely rebase with latest App Template for Nextcloud 25

Discussion:

https://help.nextcloud.com/t/is-it-possible-to-add-file-types-to-files-fulltextsearch-specifically-eml/40371/2

Note for myself:

https://github.com/nextcloud/server/blob/master/lib/public/Files_FullTextSearch/Model/AFilesDocument.php#L37-L58

## Building the app

The app can be built by using the provided Makefile by running:

    make

This requires the following things to be present:
* make
* which
* tar: for building the archive
* curl: used if phpunit and composer are not installed to fetch them from the web
* npm: for building and testing everything JS, only required if a package.json is placed inside the **js/** folder

The make command will install or update Composer dependencies if a composer.json is present and also **npm run build** if a package.json is present in the **js/** folder. The npm **build** script should use local paths for build systems and package managers, so people that simply want to build the app won't need to install npm libraries globally, e.g.:

**package.json**:
```json
"scripts": {
    "test": "node node_modules/gulp-cli/bin/gulp.js karma",
    "prebuild": "npm install && node_modules/bower/bin/bower install && node_modules/bower/bin/bower update",
    "build": "node node_modules/gulp-cli/bin/gulp.js"
}
```
