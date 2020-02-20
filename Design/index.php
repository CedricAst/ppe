<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="icon" type="image/png" href="images/icon.png">
        <link rel="stylesheet" type="text/css" href="general.css" media="all"> 
        <link rel="stylesheet" type="text/css" href="header.css" media="all"> 
        <link rel="stylesheet" type="text/css" href="header_login.css" media="all">
        <link rel="stylesheet" type="text/css" href="footer.css" media="all">
        <title>Redout</title>
    </head>
    <body>
        <div class="page"> 
            <div class="header">
                <div class="container-blocks">
                    <div class="cadre_logo">
                        <img class="logo" src="image/logo.png" alt=""/>
                    </div>
                    <div class="login">
                        <h1>REDOUT</h1>
                        <form action="connex.php" method="post">                           
                                <i class="fas fa-user"></i>                    
                                <input type="text" name="username" placeholder="Username" id="username" required>
                                <label for="password">
                                    <i class="fas fa-lock"></i>
                                </label>
                            <input type="password" name="password" placeholder="Password" id="password" required>
                            <input type="submit" value="Login">
                        </form>
                    </div>
                </div>
            </div>
            <div class="filsactu">
                <div class="container-blocks">
                    <div class="input">
                        <label> 
							
							<form action="authenticate.php" method="post">
							<label for="MDP">
							<i class="fas fa-lock"></i>
							</label>
							<input type="text" name="MDP" placeholder="Rechercher" id="Rechercher" required>
							<label>
							<input type="submit" value="Rechercher">
							</label>	
							</form>



						</label>
                    </div>
                </div>
                <div class="message">                       
                    <div class="container-blocks">
                        <div class="useraccount">                                                                  
                            <div class="container">
                                <div class="imageaccount">                      
                                </div>
                                <label> pseudo </label>
                                <label> Inscrit(e) le : </label>
                                <div class="stat">
                                    <label> vue :  </label>
                                </div>
                            </div>                               
                        </div>
                        <div class="text">  
						<label>
							
							
						</label>
                        </div>
                    </div>
                </div>
                <div class="message">  
                    <label> message </label>
                </div>
                <div class="message">  
                    <label> message </label>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="container-blocks">
                <div>© 2020 Redout</div>  
                <div>redout@gmail.com</div> 
            </div>
        </div>
    </body>
</html>