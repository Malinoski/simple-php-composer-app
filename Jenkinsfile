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
            steps {
                echo 'Deploying'
                sh '''
                    echo "Testing!"
                    ls -lah
                    pwd
                    docker build -t intranet-sdumont:v1 .                    
                    echo "end testing"                    
                '''            
            }
        }
    }
}
