pipeline {
    /* agent { docker { image 'php:5.6' } } */
    agent { dockerfile true }
    stages {
        stage('build') {
            steps {
                sh 'php --version'
            }
        }
        stage('test') {
        		steps {
            		sh "./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/"
            	}
        }
    }
}
