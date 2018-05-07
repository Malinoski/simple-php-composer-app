pipeline {
    agent none
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
        stage('Docker Build') {
	    		agent any
	      	steps {
	        		sh 'docker build -t malinoski/myapache:latest .'
	      	}
	    }
    }
}
