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
        echo 'Env File'
      
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
  triggers {
    pollSCM('H * * * *')
  }
}
