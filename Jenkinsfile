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
        stage('Deploy') {
            steps {
                echo 'Deploying TEST'
                sh 'pdw'
                sh 'docker build -t intranet-sd .'  
                sh 'docker run -tid -p 88:80 --name="intranet-sd" intranet-sd /usr/sbin/apache2ctl -D FOREGROUND'              
            }
        }
    }
}
