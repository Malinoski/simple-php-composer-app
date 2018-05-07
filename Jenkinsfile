pipeline {
    agent { 
    		dockerfile true 
    	}
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
