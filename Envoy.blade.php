@servers(['web' => 'tkok@thijskok.nl'])

@setup
$root = '~/';
$dir = $root . '/www.thijskok.nl';
$branch = 'master';
$artisan = $dir . '/artisan';
$composer = 'composer';
$npm = 'npm';
$repo = 'https://github.com/thijskok/thijskok.nl';
@endsetup

@macro('deploy')
down
pull
install
webpack
backup
migrate
up
@endmacro

@task('fetch')
cd {{ $root }};
if [ -d {{ $dir }} ]; then
rm -rf {{ $dir }};
fi;
git clone -b {{ $branch }} {{ $repo }} {{ $dir }};
@endtask

@task('pull')
cd {{ $dir }} && git pull origin {{ $branch }}
@endtask

@task('update')
cd {{ $dir }} && {{ $composer }} update -v
@endtask

@task('install')
cd {{ $dir }} && {{ $composer }} install -v
@endtask

@task('webpack')
cd {{ $dir }} && {{ $npm }} run prod
@endtask

@task('env')
cp {{ $dir }}/.env.production {{ $dir }}/.env
@endtask

@task('down')
if [ -f {{ $artisan }} ]; then
php {{ $artisan }} down
else
echo "Artisan file not found!"
fi
@endtask

@task('backup')
if [ -f {{ $artisan }} ]; then
php {{ $artisan }} snapshot:create
else
echo "Artisan file not found!"
fi
@endtask

@task('up')
if [ -f {{ $artisan }} ]; then
php {{ $artisan }} up
else
echo "Artisan file not found!"
fi
@endtask

@task('migrate')
if [ -f {{ $artisan }} ]; then
php {{ $artisan }} migrate --force
else
echo "Artisan file not found!"
fi
@endtask

@task('migrate:refresh')
if [ -f {{ $artisan }} ]; then
php {{ $artisan }} migrate:refresh --force
else
echo "Artisan file not found!"
fi
@endtask

@task('seed')
if [ -f {{ $artisan }} ]; then
php {{ $artisan }} db:seed --force
else
echo "Artisan file not found!"
fi
@endtask

@task('migrate:reset')
if [ -f {{ $artisan }} ]; then
php {{ $artisan }} migrate:reset --force
else
echo "Artisan file not found!"
fi
@endtask