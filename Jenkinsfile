#!groovy

pipeline {
    agent none
    	stages {    	
    		
    		stage('create image') {
	    		agent any
	      	steps {
	      		sh 'tar -zcvf system.tar.gz .'
	        		sh 'docker build -t malinoski/myapache .'
	      	}
	    }
    		
    		stage('test image') {
    			agent{
	    			docker {
	        			image 'malinoski/myapache'
	        		}
            	}
            	steps {
            		sh 'php --version'
            		/* TODO: check the required PHP plugins*/            		            		      		            		
        		}
        }
        
        stage('test system') {
        		agent{
	    			docker {
	        			image 'malinoski/myapache'
	        		}
            	}
        		steps {
            		sh "./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/"
            	}
        }
        
        stage('deploy') {
	    		agent any
	      	steps {
	      		sh 'docker build -t malinoski/myapache .'
	      		sh 'docker stop myapache-container || true && docker rm myapache-container || true;'
	        		sh 'docker run -tid -p 85:80 --name="myapache-container" malinoski/myapache:latest /usr/sbin/apache2ctl -D FOREGROUND'
	      	}
	    }
    	
        
    }
}
