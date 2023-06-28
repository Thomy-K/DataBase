<?php


include('./templates/header.html');

?>
    <body>
        <div class='main'>
            <h1 class='title'>Entrega 3 </h1>

            
            <div class='container'>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./queries/poblar_usuarios.php" color="white">Importar Usuarios</a>
                </li>
            </div>



            <?php if (!isset($_SESSION['username'])) { ?>
                <form  action='./queries/login.php' method='GET'>
                    <input class='btn' type='submit' value='Iniciar sesión'>
                </form>

            <?php } else { ?>
                <form action='./queries/logout.php' method="post">
                    <input type="submit" value="Cerrar sesión">
                </form>
            <?php } ?>




            <div class='container'>
                <h3>Ver base de datos 1</h3>
                <form  action='./queries/bdd1.php' method='GET'>
                    <input class='btn' type='submit' value='Consultar'>
                </form>
            </div>
            <div class='container'>
                <h3>Ver base de datos 2</h3>
                <form  action='./queries/bdd2.php' method='GET'>
                    <input class='btn' type='submit' value='Consultar'>
                </form>
            </div>
            <div class='container'>
                <h3>Procedimiento almacenado 1</h3>
                <form  action='./queries/procedimiento1.php' method='GET'>
                    <input class='btn' type='submit' value='Consultar'>
                </form>
            </div>
            <div class='container'>
                <h3>Procedimiento almacenado 2</h3>

                <form  action='./queries/procedimiento2.php' method='POST'>
                    <div class='form-element'>
                        <label for='name'>Name</label>
                        <input type='text' name='name' />
                    </div>


                    <div class='form-element'>
                        <label for='type'>Type</label>
                        <select name='type' id='type'>
                            <option value='Normal'>Normal</option>
                            <option value='Fire'>Fire</option>
                            <option value='Water'>Water</option>
                            <option value='Grass'>Grass</option>
                            <option value='Flying'>Flying</option>
                            <option value='Fighting'>Fighting</option>
                            <option value='Poison'>Poison</option>
                            <option value='Electric'>Electric</option>
                            <option value='Ground'>Ground</option>
                            <option value='Rock'>Rock</option>
                            <option value='Psychic'>Psychic</option>
                            <option value='Ice'>Ice</option>
                            <option value='Bug'>Bug</option>
                            <option value='Ghost'>Ghost</option>
                            <option value='Steel'>Steel</option>
                            <option value='Dragon'>Dragon</option>
                            <option value='Dark'>Dark</option>
                            <option value='Fairy'>Fairy</option>
                        </select>
                    </div>

                    <div class='form-element'>
                        <label for='total'>Total</label>
                        <input type='number' name='total' />
                    </div>


                    <div class='form-element'>
                        <label for='hp'>HP</label>
                        <input type='number' name='hp' />
                    </div>


                    <div class='form-element'>
                        <label for='attack'>Attack</label>
                        <input type='number' name='attack' />
                    </div>


                    <div class='form-element'>
                        <label for='defense'>Defense</label>
                        <input type='number' name='defense' />
                    </div>


                    <div class='form-element'>
                        <label for='sp_atk'>Sp. Atk</label>
                        <input type='number' name='sp_atk' />
                    </div>


                    <div class='form-element'>
                        <label for='sp_def'>Sp. Def</label>
                        <input type='number' name='sp_def' />
                    </div>


                    <div class='form-element'>
                        <label for='speed'>Speed</label>
                        <input type='number' name='speed' />
                    </div>

                    <div class='form-element'>
                        <label for='legendary'>Legendary</label>
                        <select name='legendary' id='legendary'>
                            <option value='true'>True</option>
                            <option value='false'>False</option>
                        </select>
                    </div>


                    <div class='form-element'>
                        <label for='generation'>Generation</label>
                        <input type='number' name='generation'  min='1' max='3'/>
                    </div>


                    <input class='btn' type='submit' value='Consultar'>
                </form>
            </div>
        </div>
        <footer>
            <p>
                IIC2413 - Ayudantía 3 BDD
            </p>
        </footer>

    </body>
</html>