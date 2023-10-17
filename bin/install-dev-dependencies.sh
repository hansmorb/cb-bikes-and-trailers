wp core download --path=wp-core
wp plugin delete akismet
cd wp-core/wp-content/plugins
git clone git@github.com:wielebenwir/commonsbooking.git
cd commonsbooking
composer install --ignore-platform-reqs
