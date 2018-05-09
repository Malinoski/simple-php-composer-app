#!groovy

pipeline {
    agent none
    	stages {    	
    		
    		stage('create image') {
	    		agent any
	      	steps {
	      	
	      		/* Compress the system, because Dockerfile require it on "docker build" */
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
            	
            		/* Check if php is working*/
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
        		
        			/* Run PHPUnit */
            		sh "./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/"
            	}
        }
        
        stage('deploy') {
	    		agent any
	      	steps {
	      		
	      		/* Stop and delete previous container*/
	      		sh 'docker stop myapache-container || true && docker rm myapache-container || true;'
	        		
	        		/* Run container */
	        		sh 'docker run -tid -p 85:80 --name="myapache-container" malinoski/myapache:latest /usr/sbin/apache2ctl -D FOREGROUND'
	        		
	        		/* Delete dangling images - <none> as id. 
	        		Ref: 
	        		http://www.totallymoney.com/blog/cleaning-up-docker-images-on-jenkins-build-machines/
	        		https://stackoverflow.com/questions/12137431/test-if-a-command-outputs-an-empty-string
	        		*/
	        		sh '''
	        			dangling=$(docker images -q -f dangling=true); # Store in var if has dangling images
	        			if [[ $? != 0 ]];  # exit code of the last command (zero for success, non-zero for failure).
	        				then echo "No dagling containers"; # do nothing
	        				else docker rmi $(docker images -q -f dangling=true); # remove dangling images  
	        			fi;
	        		'''
	        		
	      	}
	    }
    	
        
    }
}
