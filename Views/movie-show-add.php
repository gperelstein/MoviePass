<?php
    require_once('checkAdmin.php');
?>
<main>
    <section id="movieShowAdd">
        
        <h1 class="text-danger px-2 pt-4">Add Movie Show</h1>

        <form action="<?php echo FRONT_ROOT ?>MovieShow/Add" method="post">            
            
            <div class="px-1 pb-3 row">

                <!-- seleccionar pelicula -->
                <div class="col-3 m-1">                    
                    <label for="" class="px-1 text-primary d-block">select movie</label>                        
                    <select class="custom-select" name="movieId">

                        <!-- opciones de peliculas desde la base de datos -->
                        <?php 
                            foreach($this->movieList as $movie)
                            {                             
                                ?><option value="<?php echo $movie->getId(); ?>"> <?php echo $movie->getTitle(); ?> </option>                            
                            <?php
                            }                      
                        ?>
                    </select>
                </div>
                <!-- seleccionar cine -->
                <div class="col-3 m-1">                    
                    <label for="" class="px-1 text-primary d-block">select cinema</label>                    
                    <select class="custom-select" name="cinemaId">
                                                
                        <!-- opciones de cines desde la base de datos -->
                        <?php 
                            foreach($this->cinemaList as $cinema)
                            {
                                ?><option value="<?php echo $cinema->GetId() ?>"><?php echo $cinema->GetName()?></option>                            
                            <?php
                            }                      
                        ?>

                    </select>
                </div>

                <!-- seleccionar fecha -->
                <div class="col-1 p-0 m-1">                    
                    <label for="" class="px-1 text-primary d-block">select date</label>                    
                    <input required type="date" name="movieShowDate" id="date" min="" max="" class="my-1 mdate">                    
                </div>                

                <!-- seleccionar horario -->
                <div class="col-1 p-0 m-1 ml-5">                    
                    <label for="" class="px-1 text-primary d-block">select time</label>                    
                    <select name="movioShowTime" class="custom-select">                                                      
                        
                        <!-- opciones de tiempo -->
                        <option value="9" selected>9 hs</option>                        
                        <option value="13" selected>13 hs</option>                        
                        <option value="17" selected>17 hs</option>                        
                        <option value="21" selected>21 hs</option>                        
                    </select>                                   
                </div>                
                                
                <!-- boton agregar movie show -->
                <div class="col-2 p-0 m-0 ml-4">  
                    <label for="" class="px-1 text-primary d-block">add movie show</label>
                    <button type="submit" class="btn btn-success my-1 px-5">ADD</button>
                </div>
            </div>

        </form>
    </section>
</main>
<script src="<?php echo JS_PATH ?>date.js"></script>




