<!doctype html>
<html lang="Pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

       <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>MY SCHOOL</title>

    <!-- link para fa folha de estilo Bootstrap.CSS -->
	<link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- link para fa folha de estilo my_school.css -->
    <link href="my_school.css" rel="stylesheet">
     <!--link para O javaScript bootstrap da pagina-->
     <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>



 <!--link para O javaScript slide da pagina-->



  </head>

  <body>
    <!--codigo para toda aria de navegação-->
<nav class=" rounded navbar navbar-expand-md fixed-top navbar-dark  bg-dark ">

				  <div class="container-fluid">

				    <a class="navbar-brand" href="#" > <img src="imagens/MySchoolLogo1.png" class="logo"></a>
                   <!--botão responsivo do collapse-->

				    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">

				      <span class="navbar-toggler-icon">Aqui</span>

				    </button>

				    <div class="collapse navbar-collapse" id="navbarCollapse">
				      <ul class="navbar-nav me-auto mb-2 mb-md-0">
				        <li class="nav-item">

				          <a class="nav-link active" aria-current="page" href="#" tabindex="-1">Iniciar</a>
				        </li>
				        <li class="nav-item">
				          <a class="nav-link " href="#"  tabindex="-1"   data-bs-toggle="modal" data-bs-target="#logar" >Logar</a>
				        </li>



				         <!--codigo para o link "menu" -->

				        <li class="nav-item dropdown">
				          <a class="nav-link dropdown-toggle" href="#" tabindex="-1" id="drop" data-bs-toggle="dropdown" aria-expanded="true">Menu</a>
			            <ul class="dropdown-menu dropdown-menu-end bg-darkS" aria-labelledby="drop">
			              <li><a class="dropdown-item list-group-item-dark">Cadastrar-se</a></li>
			              <li><a class="dropdown-item" href="#">Visitar primeiro</a></li>

			              <li ><a class="dropdown-item list-group-item-dark"href="#">Comentar</a></li>
			              <li><hr class="dropdown-divider"></li>
			              <li class="c"><a class="dropdown-item list-group-item-dark" href="#">Ajuda</a></li>
			            </ul>


				        </li>


				        				 <!--codigo para o link "outras opcoes" -->

				        <li class="nav-item dropdown">
				          <a class="nav-link dropdown-toggle" href="#" tabindex="-1" id="drop" data-bs-toggle="dropdown" aria-expanded="true">Outras Opções</a>
			            <ul class="dropdown-menu dropdown-menu-end bg-darkS" aria-labelledby="drop">
			              <li><a class="dropdown-item list-group-item-dark">Criar Perfil Na MY School</a></li>
			              <li><a class="dropdown-item" href="#">Criar Grupo De Estudo Na My School</a></li>
			              <li ><a class="dropdown-item list-group-item-dark"href="#">Criar  chat Na My School</a></li>
			               <li><a class="dropdown-item ">Criar Página Na mY school</a></li>
			              <li ><a class="dropdown-item list-group-item-dark"href="#">...</a></li>
			              <li><hr class="dropdown-divider"></li>
			              <li class="c"><a class="dropdown-item list-group-item-dark" href="#" data-bs-toggle="modal" data-bs-target="#ajuda" >Ajuda</a></li>
			            </ul>
				        </li>

				      </ul>

<!-- codigo para a barra de pesquisa-->
<form class="d-flex form-group" >
				        <input class="form-control me-2" type="search" placeholder="digite o nome da escola para pesquisar" aria-label="Search">
				        <button class="btn btn-outline-warning" type="submit">pesquisar</button>
				      </form>
				      </div>

				      </div>
</nav>



       </form>
       <!--codigo da login  my school modal-->
<article class="my-3" id="modal">
    <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">

    </div>
    <div>
        <div class="bd-example">
            <div class="d-flex justify-content-between flex-wrap">
            </div>
        </div>
    </div>
</article>
































<div class="modal fade" id="logar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
    <div  class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logar">Cadastro de Funcionário</h5>
                <!--img src="../../public/img/MySchoolLogoSobre1.png"-->
            </div>

            <!--form da modal logar-->
            <div class="modal-body">
                <div class="col-md-12">
                <form action="/escolas" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group opsao">
                            <label for="image">Imagem da Escola</label>
                            <input type="file" name="image" id="image" class="from-control-file">
                        </div>

                        <div class="form-group opsao">
                            <label for="name">Escola:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nome da Escola">
                        </div>

                        <div class="form-group opsao">
                            <label for="local">Endereço:</label>
                            <input type="text" name="local" id="local" class="form-control" placeholder="Província / munincípio / bairro / rua">
                        </div>

                        <div class="form-group opsao">
                            <label for="private">Estatúto</label>
                            <select name="private" id="private" class="form-control">
                                <option value="0">Pública</option>
                                <option value="1">Privada</option>
                                <option value="2">Comparticipada</option>
                            </select>
                        </div>

                        <div class="form-group opsao">
                            <label for="description">Descrição:</label>
                            <textarea type="text" name="description" id="description" class="form-control" placeholder="Sobre a escola"></textarea>
                        </div>

                        <div class="form-group opsao">
                            <label for="itens">Extracurricular:</label>
                            <div class="form-group">
                                <input type="checkbox" name="itens[]" value = "Educação Física"> Educação Física
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="itens[]" value = "Campionato Escolar"> Campionato Escolar
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="form-group opsao">
                                <input type="submit" value="Enviar" class="btn btn-dark" id ="botao">
                            </div>

                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">CANCELAR</button>
                            <button type="submit" class=" btn btn-warning">LOGAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>













































     <!-- codigo para o "sobre a pagina" -->

<div class="modal fade" id="ajuda" tabindex="-1" aria-labelledby="ajuda" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header" style="background-color: chocolate;">

        <h2 class="modal-title " id="ajuda"> <img src="imagens/MySchoolLogo1.png" class="logo">  <h2 style="color: #fff;"> <small> A tua escola nas mãos</small> </h2></h2>


      </div>
      <div class="modal-body" style="font-style: italic; background-color: black;">
           <h4>Objetivo da Página</h4>
         <p>Yo, shout out to all you kids, buying bottle service, with your rent money. So I sat quietly, agreed politely. They say, be afraid you're not like the others, futuristic lover. Boom, boom, boom. Don't need apologies. We can dance, until we die, you and I, will be young forever. If you choose to walk away, don’t walk away. You know that I'm the girl that you should call. This Friday night, do it all again.</p>
        <p>I'm walking on air. But lil' mama so dope. It's time to bring out the big balloons. Are you ready for, ready for. The boys break their necks try'na to creep a little sneak peek. Summer after high school when we first met. If you want it all. (This is how we do) You open my eyes and I'm ready to go, lead me into the light.</p>

        <h4>Como Utilizar a Página</h4>
        <p>
			<ul>
				<li>Don't be a shy kinda guy I'll bet it's beautiful. You fall asleep during foreplay, 'Cause the pills you take, are more your forte. Open up your heart.</li>
				<li>You're never gonna be unsatisfied. Know that you are worthy.</li>
				This one goes out to the ladies at breakfast in last night's dress. You think you've seen her in a magazine.
				<li> I should've told you what you meant to me 'Cause now I pay the price. Takes you miles high, so high, 'cause she’s got that one international smile</li>.
			</p>

    </ul>

     <P>
        	<ul>
        		<li><a href=""> Ajuda de especialistas </a></li>
        	</ul>
        </P>
      </div>
      <div class="modal-footer" style="background-color:chocolate; ">
      	<h2 ></h2>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
</nav>


				<!--codigo corpo da my school-->
				<div class="container">

					<!--codigo da publicadade da my school-->
					<div class="row">
						<div class="col-12">
						<main class="bg-secondary p-5 rounded">

                                 <div>
        <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>

            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class="active" aria-current="true" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 3"></button>

          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
             <img src="imagens/my scholl fundo.png" style="width: 100%; height:2%; ">
              <div class=" d-none d-md-block">
                <h5>First slide label</h5>
                <p>first slide.</p>
              </div>
            </div>


             <div class="carousel-item">
               <img src="imagens/tua escolafundo.png" style="width: 100%; height:0.5%; ">

              <div class=" d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>


          </div>


							</main>
						</div>
					</div>

						<!--codigo da divisão  de rows-->
						<div class="row">
							<div class="col-12"></div>
						<main class="p-3 rounded">
							 <nav>
							          <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
							            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
							            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Ensino Superior</button>
							            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Ensino Medio</button>

							            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Ensino Geral</button>

							        </nav>
						</main>
					</div>

				   <!--codigo da publicadades gerais e pedidas-->
						<div class="row">
							<div class="col-12">
							<main class="bg-secondary p-5 rounded">

											 <h2 class="h6 pt-4 pb-3 mb-4 border-bottom"></h2>

							        <div class="tab-content" id="nav-tabContent">
							        		  <!--primeira parte-->
							          <div class="tab-pane show active " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							          	<div class="row">
							          	<div class="col-6" style="border: solid 1px red; ">

							            <p>LOVESNER content for the tab panel. This one relates to the home tab. Takes you miles high, so high, 'cause she’s got that one international smile. There's a stranger in my bed, there's a pounding in my head. Oh, no. In another life I would make you stay. ‘Cause I, I’m capable of anything. Suiting up for my crowning battle. Used to steal your parents' liquor and climb to the roof. Tone, tan fit and ready, turn it up cause its gettin' heavy. Her love is like a drug. I guess that I forgot I had a choice.</p>
							        	</div>

							        	<div class="col-6" style="border: solid 1px red; ">
							            <p>LOVESNER content for the tab panel. This one relates to the home tab. Takes you miles high, so high, 'cause she’s got that one international smile. There's a stranger in my bed, there's a pounding in my head. Oh, no. In another life I would make you stay. ‘Cause I, I’m capable of anything. Suiting up for my crowning battle. Used to steal your parents' liquor and climb to the roof. Tone, tan fit and ready, turn it up cause its gettin' heavy. Her love is like a drug. I guess that I forgot I had a choice.</p>
							        	</div>
										</div>
							          </div>

							          <!--segunda parte-->
							          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
							            <div class="row">
							          	<div class="col-4" style="border: solid 1px red; ">
							            <p>LOVESNER content for the tab panel. This one relates to the home tab. Takes you miles high, so high, 'cause she’s got that one international smile. There's a stranger in my bed, there's a pounding in my head. Oh, no. In another life I would make you stay. ‘Cause I, I’m capable of anything. Suiting up for my crowning battle. Used to steal your parents' liquor and climb to the roof. Tone, tan fit and ready, turn it up cause its gettin' heavy. Her love is like a drug. I guess that I forgot I had a choice.</p>
							        	</div>

							        	<div class="col-8" style="border: solid 1px red; ">
							            <p>LOVESNER content for the tab panel. This one relates to the home tab. Takes you miles high, so high, 'cause she’s got that one international smile. There's a stranger in my bed, there's a pounding in my head. Oh, no. In another life I would make you stay. ‘Cause I, I’m capable of anything. Suiting up for my crowning battle. Used to steal your parents' liquor and climb to the roof. Tone, tan fit and ready, turn it up cause its gettin' heavy. Her love is like a drug. I guess that I forgot I had a choice.</p>
							        	</div>
										</div>
							          </div>

							          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
							            <p>Placeholder content for the tab panel. This one relates to the contact tab. Her love is like a drug. All my girls vintage Chanel baby. Got a motel and built a fort out of sheets. 'Cause she's the muse and the artist. (This is how we do) So you wanna play with magic. So just be sure before you give it all to me. I'm walking, I'm walking on air (tonight). Skip the talk, heard it all, time to walk the walk. Catch her if you can. Stinging like a bee I earned my stripes.</p>
							          </div>
							        </div>
							       </div>

                             </main>
							</div>



				</div>
  </body>
</html>
