pipeline {
    agent { 
    		dockerfile true 
    	}
    	stages {
        stage('build') {
            steps {
            		sh 'php --version'    
            		sh 'date'            		
            }
        }
        stage('test') {
        		steps {
            		sh "./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/"
            	}
        }
        stage('deploy') {
	    		agent any
	      	steps {
	        		sh '''
	        			docker build -t malinoski/myapache:latest .
	        			docker run -tid -p 85:80 --name="myapache-container" malinoski/myapache:latest
	        		'''
	      	}
	    }
    }
}
