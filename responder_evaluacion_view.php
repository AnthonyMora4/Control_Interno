<?php include("includes/header.php") ?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/estilo_checkbox.css">
<link rel="stylesheet" href="css/estilo_f.css">

<h2>Tabla de Información Personal</h2>
     
   <ul class="responsive-table">
     <li class="table-header">
       <div class="col col-1">Opciones</div>
       <div class="col col-2">Señale la opcion que describa mejor su situacion actual o la de su entidad marcando la celda correspondiente en la columna de la derecha</div>
       <div class="col col-3">Marcar</div>
       <div class="col col-4">Evidencia</div>
     </li>
   
     <li class="table-row">
       <div class="col col-1" data-label="Job Id">a</div>
       <div class="col col-2" data-label="Customer Name"><textarea name="txt1" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')"></textarea></div>
       <div class="col col-3" data-label="Payment Status">
       <label class="b-contain"><span>Marcar</span><input type="checkbox" name="ch1" value="1"><div class="b-input"></div></label>
       </div>
       <div class="col col-4" data-label="Amount"><textarea name="txt2" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')"placeholder="Ingrese el link de la evidencia"></textarea></div>
       
     </li>
     <li class="table-row">
       <div class="col col-1" data-label="Job Id">b</div>
       <div class="col col-2" data-label="Customer Name"><textarea name="txt3" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')"></textarea></div>
       <div class="col col-3" data-label="Payment Status">
       <label class="b-contain"><span>Marcar</span><input type="checkbox" name="ch2"  value="1"><div class="b-input"></div></label>
       </div>
       <div class="col col-4" data-label="Amount"><textarea name="txt4" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" placeholder="Ingrese el link de la evidencia"></textarea></div>
     </li>
     <li class="table-row">
       <div class="col col-1" data-label="Job Id">c</div>
       <div class="col col-2" data-label="Customer Name"><textarea name="txt5" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')"></textarea></div>
       <div class="col col-3" data-label="Payment Status">
       <label class="b-contain"><span>Marcar</span><input type="checkbox" name="ch3"  value="1"><div class="b-input"></div></label>
       </div>
       <div class="col col-4" data-label="Amount"><textarea name="txt6" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" placeholder="Ingrese el link de la evidencia"></textarea></div>
     </li>
     <li class="table-row">
       <div class="col col-1" data-label="Job Id">d</div>
       <div class="col col-2" data-label="Customer Name"><textarea name="txt7" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" ></textarea></div>
       <div class="col col-3" data-label="Payment Status">
       <label class="b-contain"><span>Marcar</span><input type="checkbox" name="ch4"  value="1"><div class="b-input"></div></label>
       </div>
       <div class="col col-4" data-label="Amount"><textarea name="txt8" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" placeholder="Ingrese el link de la evidencia"></textarea></div>
     </li>
     <li class="table-row">
       <div class="col col-1" data-label="Job Id">e</div>
       <div class="col col-2" data-label="Customer Name"><textarea name="txt9" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" ></textarea></div>
       <div class="col col-3" data-label="Payment Status">
       <label class="b-contain"><span>Marcar</span><input type="checkbox" name="ch5"  value="1"><div class="b-input"></div></label>
       </div>
       <div class="col col-4" data-label="Amount"><textarea name="txt10" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')" placeholder="Ingrese el link de la evidencia"></textarea></div>
     </li>
     <input type="submit">

<?php include("includes/footer.php") ?>







