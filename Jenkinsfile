pipeline {
  agent any
  stages {
    stage('Build') {
      steps {
        sh 'composer install'
      }
    }
    stage('Test Unitaire') {
      steps {
        sh './vendor/bin/phpunit '
      }
    }
  }
}