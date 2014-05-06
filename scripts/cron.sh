#!/bin/sh

for site in /etc/drupal/7/sites/* ; do
	BASE_URL=""

	if [ ! "`basename $site`" = "all" ]; then
		for file in $site/baseurl.php $site/settings.php; do
			[ -f "$file" ] && BASE_URL=`grep '^$base_url' $file | cut -d"'" -f2`
			[ "X$BASE_URL" != "X" ] && break
		done

		for file in $site/cronkey.php $site/settings.php; do
			[ -f "$file" ] && CRON_KEY=`grep '^$cron_key' $file | cut -d"'" -f2`
			[ "X$CRON_KEY" != "X" ] && break
		done

		if [ "X$BASE_URL" = "X" ] ; then
			BASE_URL='http://localhost/drupal7'
		fi

		if [ "X$CRON_KEY" = "X" ] ; then
			curl --fail --silent --compressed --location $BASE_URL/cron.php
		else
			curl --fail --silent --compressed --location $BASE_URL/cron.php?cron_key=$CRON_KEY
		fi
	fi
done
