            <div id="menu">
               <ul>
                   <li id="add">Add a new user</li>
                   <li id="connect">Se connecter</li>
               </ul>
            </div>
            <form action="./traitement/traitementAdd.php" method="post" id="addUserForm">
               <div class="titleForm">
                   <p>Add a new user</p>
                   <p id="fermerAddUserForm">X</p> 
              </div>
                <input type="text" placeholder="your first name" name="prenom"><br/>
                <input type="text" placeholder="your last name" name="nom"><br/>
                <input type="email" placeholder="your email" name="email"><br/>
                <input type="password" placeholder="password" name="password"><br/>
                <input type="password" placeholder="confirm your password" name="password-confirm"><br/>
                <input type="submit" value="add" name="submit">
            </form>

            <form action="./traitement/traitementConnect.php" method="post" id="connectForm">
               <div class="titleForm">
                   <p>Log in</p>
                   <p id="fermerConnectForm">X</p> 
              </div>
                <input type="email" placeholder="your email" name="email"><br/>
                <input type="password" placeholder="password" name="password"><br/>
                <input type="submit" value="Log in" name="submit">
            </form>