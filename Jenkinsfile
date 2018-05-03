pipeline {
    agent { docker { image 'php' } }
    stages {
        stage('build') {
            steps {
                sh 'php --version'
            }
        }
        stage('test') {
            sh "./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/"
        }
    }
}
