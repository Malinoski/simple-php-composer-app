pipeline {
    agent none
    	stages {
    	
    		stage('create image') {
	    		agent any
	      	steps {
	        		sh 'docker build -t malinoski/myapache:latest .'
	      	}
	    }
    	
    		stage('build') {
    			agent{
	    			docker {
	        			image 'malinoski/myapache:latest'
	        		}            		
            	}
            	steps {
            		sh 'php --version'    
            		sh 'date'            		
        		}
        }
        
        stage('test') {
        		agent{
	    			docker {
	        			image 'malinoski/myapache:latest'
	        		}            		
            	}
        		steps {
            		sh "./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/"
            	}
        }
    	
        
    }
}
