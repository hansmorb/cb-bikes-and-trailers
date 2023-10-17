wp core download --path=wp-core
wp plugin delete akismet
cd wp-core/wp-content/plugins || exit
git clone git@github.com:wielebenwir/commonsbooking.git
cd commonsbooking || exit
composer install --ignore-platform-reqs
