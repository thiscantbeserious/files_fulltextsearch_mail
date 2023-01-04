# files_fulltextsearch_mail

Forked from a very old NC15 extension - this one should parse also the body of the emails, not just the header.

Will have to check if the whole extension base is feasible after all this time of if I just start from scratch first.

So maybe the fork will be actually something brand new.

Discussion:

https://help.nextcloud.com/t/is-it-possible-to-add-file-types-to-files-fulltextsearch-specifically-eml/40371/2

Note for myself:

https://github.com/nextcloud/server/blob/master/lib/public/Files_FullTextSearch/Model/AFilesDocument.php#L37-L58

----

Parse your mail before index

### Installation / Setup

you need NC15 and php-mailparser

>     $ make composer

