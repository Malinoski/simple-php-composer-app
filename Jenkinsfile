pipeline {
	agent any 
	stages {
	    stage('build') {
	    		agent { 
		    		dockerfile true 
		    	}
	        steps {
	        		sh 'php --version'    
	        		sh 'date'            		
	        }
	    }
	    stage('test') {
	    		agent { 
		    		dockerfile true 
		    	}
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
