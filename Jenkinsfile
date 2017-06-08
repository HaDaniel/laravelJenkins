pipeline {
  agent any
  stages {
    stage('Build') {
      steps {
        echo 'Build'
        sh 'composer install'
      }
    }
    stage('Database') {
      steps {
        echo 'Create Env'
        sh '''echo "
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:GPxZVxASP7tvf2JhDHmLCD4b83mX4/x/DILxgD8z/KE=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=root
DB_PASSWORD=0000

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
" > .env'''
        sh 'php artisan key:generate'
        sh 'composer dump-autoload'
        sh 'php artisan migrate:refresh --seed'
      }
    }
    stage('Test') {
      steps {
        echo 'phpunit'
        sh './vendor/bin/phpunit'
        sh './vendor/bin/phpunit > log.txt'
        echo 'behat'
        sh './vendor/bin/behat'
        sh 'echo '------------phpunit-----------------------------------' >> log.txt'
        sh './vendor/bin/behat >> log.txt'
        echo 'phpcbf'
        sh './vendor/bin/phpcbf app/'
        sh 'echo '------------phpcbf-----------------------------------' >> log.txt'
        sh './vendor/bin/phpcbf >> log.txt'
        echo 'phploc'
        sh './vendor/bin/phploc app/'
        sh 'echo '------------phploc-----------------------------------' >> log.txt'
        sh './vendor/bin/phploc >> log.txt'
        echo 'pdepend'
        sh 'echo '------------phploc-----------------------------------' >> log.txt'
        sh './vendor/bin/pdepend --dependency-xml app/ >> log.txt'
        echo 'phpmd'
        sh 'echo '------------phpmd-----------------------------------' >> log.txt'
        sh './vendor/bin/phpmd app/ xml codesize --reportfile log.xml --suffixes php'
        sh './vendor/bin/phpmd app/ xml codesize  >> log.txt '
      }
    }
  }
}
