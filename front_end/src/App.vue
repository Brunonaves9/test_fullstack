<template>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <router-link class="navbar-brand" to="/"><img class="img-fluid" src="./assets/logo.png" style="width: 50px"></router-link>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/about">Sobre</router-link>
          </li>          
          <li class="nav-item">
            <router-link class="nav-link" to="/lista">Eletrodomésticos</router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <router-view/>
</template>
