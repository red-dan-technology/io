<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>RDT IO</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
      <link href="/theme/io/fingerPrint/css/io.css" rel="stylesheet">
   </head>
   <body>
      <nav class="navbar navbar-light bg-light">
         <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Digital persona IO
            </a>
         </div>
      </nav>
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <form
                     class="register-form m-4"
                     >
                     <div class="row">
                        <div
                           class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2"
                           style="text-align: center"
                           >
                           <div style="position: relative">
                              <div onclick="start('L',1)"
                                 class="L1 finger-izquierda-menique"
                                 ></div>
                              <div onclick="start('L',2)"
                                 class="L2 finger-izquierda-indice"
                                 ></div>
                              <div onclick="start('L',3)"
                                 class="L3 finger-izquierda-corazon"
                                 ></div>
                              <div onclick="start('L',4)"
                                 class="L4 finger-izquierda-anular"
                                 ></div>
                              <div onclick="start('L',5)"
                                 class="L5 finger-izquierda-pulgar"
                                 ></div>
                              <img
                                 src="/theme/io/fingerPrint/left.jpg"
                                 class="img-hand"
                                 />
                              <h3>IZQUIERDA</h3>
                           </div>
                        </div>
                        <div
                           class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2"
                           style="text-align: center"
                           >
                           <div style="position: relative">
                              <div onclick="start('R',1)"
                                 class="R1 finger-derecha-pulgar"
                                 ></div>
                              <div onclick="start('R',2)"
                                 class="R2 finger-derecha-indice"
                                 ></div>
                              <div onclick="start('R',3)"
                                 class="R3 finger-derecha-corazon"
                                 ></div>
                              <div onclick="start('R',4)"
                                 class="R4 finger-derecha-anular"
                                 ></div>
                              <div onclick="start('R',5)"
                                 class="R5 finger-derecha-menique"
                                 ></div>
                              <img
                                 src="/theme/io/fingerPrint/rigth.jpg"
                                 class="img-hand"
                                 />
                              <h3>DERECHA</h3>
                           </div>
                        </div>
                        <div
                           class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2"

                           >
                           <b>Token</b> <br><br>
                           <input disabled id="token" class="form-control">
                           <br>
                           <button type="button" class="btn btn-sm btn-success" id="btn-generate-token" onclick="createToken()">Generar</button>
                           <button type="button" class="btn btn-sm btn-danger" id="btn-destroy-token" onclick="destroyToken()">Eliminar</button>
                           <hr>
                           <b>Register</b> <br><br>
                           <div class="form-group">
                            <label for="name">Name</label>
                            <input required id="name" class="form-control" value="Luis">
                           </div> <br>
                           <div class="form-group">
                            <label for="identifier">Identifier</label>
                            <input required id="identifier" class="form-control" value="24082021">
                           </div> <br>
                           <button type="button" class="btn btn-sm btn-success" onclick="searching()">Consultar</button>
                           <button type="button" class="btn btn-sm btn-primary" onclick="verification()">Validar</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div
               id="content-capture"
               style="
               padding-top: 10%;
               position: fixed;
               width: 100%;
               height: 100%;
               left: 0;
               background: rgba(0, 0, 0, 0.3);
               top: 0;
               z-index: 1000;display: none
               "
               >
               <div style="position: absolute; left: 45%">
                  <table>
                     <tr>
                        <td>
                           <div id="content-animate-finger" style="width: 100%;">
                              <span style="background: rgba(0, 0, 0, 0.6); padding: 112px 0px">
                              <img
                                 src="/theme/io/fingerPrint/fingerprint-anim.gif"
                                 style="
                                 width: 200px;
                                 height: 250px;
                                 border: 1px solid #fff;
                                 border-radius: 3px;
                                 "
                                 />
                              </span>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div id="content-finger" style="width: 100%; display: none">
                              <span
                                 class="reader-finger"
                                 id="content-reader"
                                 style="
                                 width: 250px;
                                 height: 250px;
                                 background: #fff;
                                 border-radius: 5px;
                                 "
                                 >
                              <span id="imagediv" style="width: 250px">

                              </span>
                              </span>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td style="text-align: center">
                           <div id="status" style="color: #fff"></div>
                           <button id="btn-save" style="display: none"
                              class="btn btn-success" onclick="register()"
                              >
                           Guardar
                           </button>
                           <button id="btn-destroy" onclick="destroy()"
                              class="btn btn-warning" style="display: none"
                              >
                           Eliminar
                           </button>
                           <button
                           onclick="stop()"
                              style="margin-left: 10px"
                              class="btn btn-danger"
                              >
                           Cancelar
                           </button>
                        </td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </body>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="/theme/io/fingerPrint/js/enviroment.js" ></script>
    <script src="/theme/io/fingerPrint/js/io.js" ></script>
    <script src="/theme/io/fingerPrint/js/app.js" ></script>
</html>
