

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"rel="stylesheet"/>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
      <link rel="stylesheet" href="styles.css" />
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <title>Tiket Konser</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lora:wght@600;700&family=Poppins:wght@400;500;600;700&display=swap");

:root {
  --primary-color: #2f2f2f;
  --text-dark: #18181b;
  --text-light: #71717a;
  --white: #ffffff;
  --max-width: 1200px;
  --header-font: "poppins", serif;
}

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

.section__container {
  max-width: var(--max-width);


  margin: auto;
  padding: 8rem 1rem;
}

.section__header {
  margin-bottom: 1rem;
  font-size: 2.5rem;
  font-weight: 700;

  font-family: var(--header-font);
  color: var(--text-dark);
}

.section__headeri {
  margin-bottom: 1rem;
  font-size: 2rem;
  font-weight: 700;
  position: relative;
  font-family: var(--header-font);
  color: var(--text-dark);
}

.section__subheader {
  color: var(--text-light);
}

.btn {
  padding: 0.75rem 2rem;
  font-size: 1rem;
  color: var(--white);
  background-color: var(--primary-color);
  border-radius: 5rem;
  cursor: pointer;
  transition: 0.3s;
}

.btn:hover {
  background-color: var(--text-dark);
}

img {
  display: flex;
  width: 100%;
}

a {
  text-decoration: none;
}

html,
body {
  scroll-behavior: smooth;
  overflow-x: hidden;
}

body {
  font-family: "Poppins", sans-serif;
}

header {
  background-color: #000000;
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat;
}

nav {
  max-width: var(--max-width);
  margin: auto;
  padding: 1rem 1rem;
  display: flex;
  align-items: center;
  justify-content: space-between;

}

.nav__logo {
  flex: 1;
}

.nav__logo a {
  font-size: 1.5rem;
  font-weight: 600;
  font-family: var(--header-font);
  color: var(--white);
}

.nav__links {
  list-style: none;
  display: flex;
  align-items: center;
  gap: 2rem;
}

.link a {
  position: relative;
  padding: 10px 0;
  color: var(--white);
  transition: 0.3s;
}

.link a::after {
  position: absolute;
  content: "";
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  height: 2px;
  width: 0;
  background-color: var(--white);
  transition: 0.3s;
}

.link a:hover::after {
  width: 100%;
}



.nav__menu__btn {
  display: none;
  font-size: 1.5rem;
  color: var(--white);
}

.nav__actions {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: flex-end;
  gap: 2rem;
}

.nav__actions span {
  font-size: 1.2rem;
  color: var(--white);
  cursor: pointer;
}

.header__container {
  position: relative;
  max-width: fit-content;
  text-align: center;
  color: var(--white);
  overflow: hidden;
  background: rgba(0, 0, 0, 0.5);
}

.background-video {
  position: absolute;
  top: 0;
  left: 0;
  background-color: #000
 opacity: 50\%;
  width: 100%;
  height: 100%;
  object-fit: cover; /* Untuk memastikan video memenuhi container */
  z-index: -1; /* Mengatur video di belakang konten lainnya */
}


.header__container h1 {
  color: #ffffff;
  margin-top: 4rem;
  margin-bottom: 1rem;
  font-size: 4rem;
  font-weight: 600;
  font-family: var(--header-font);
}

.header__container p {
  max-width: 600px;
  margin-inline: auto;
  margin-bottom: 4rem;
  font-size: 1.2rem;
}

.header__container form {
  width: 100%;
  max-width: 350px;
  margin-inline: auto;
  margin-bottom: 4rem;
  padding-block: 0.25rem;
  padding-inline: 1.25rem 0.25rem;
  display: flex;
  align-items: center;
  backdrop-filter: blur(10px);
  border: 1px solid var(--white);
  border-radius: 5rem;
}

.header__container input {
  width: 100%;
  outline: none;
  border: none;
  font-size: 1rem;
  color: var(--white);
  background-color: transparent;
}

.header__container input::placeholder {
  color: var(--white);
}

.header__container button {
  padding: 11px 12px;
  font-size: 1.25rem;
  outline: none;
  border: none;
  color: var(--white);
  background-color: var(--primary-color);
  border-radius: 100%;
  cursor: pointer;
}

.header__container a {
  display: inline-block;
  padding: 0 12px;
  font-size: 3rem;
  color: var(--white);
  backdrop-filter: blur(10px);
  border: 1px solid var(--white);
  border-radius: 100%;
}
@keyframes slideInUp {
        0% {
            transform: translateY(30px);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes slideOutDown {
        0% {
            transform: translateY(0);
            opacity: 1;
        }
        100% {
            transform: translateY(30px);
            opacity: 0;
        }
    }

/* Styling untuk container utama */
.choose__container {
  position: relative;
  display: grid;
  grid-template-columns: 1fr 1fr; /* Membagi menjadi dua kolom, satu untuk gambar dan satu untuk konten */
  gap: 3rem; /* Memberikan jarak antar kolom */
  align-items: center;
   opacity: 0; /* Mulai dengan tidak terlihat */
        transition: opacity 0.5s ease-in-out;
}
 .choose__container.visible {
        opacity: 1; /* Tampilkan elemen */
        animation: slideInUp 1s ease-in-out forwards; /* Terapkan animasi masuk */
    }

/* Gambar bagian choose */
.choose__image {
  display: flex;
  justify-content: flex-start; /* Menempatkan gambar ke kiri */
  margin-right: 2rem; /* Memberikan jarak antara gambar dan konten teks */
}

.choose__image img {
  max-width: 500px;
  margin: auto;
  border-radius: 10px;
  box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.2);
}

/* Styling untuk konten bagian choose */
.choose__content {
  margin-left: 2rem; /* Memberikan jarak antara teks dan gambar */
  text-align: left;
}

/* Styling untuk grid dalam bagian choose */
.choose__grid {
  margin-top: 2rem;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 2rem 1rem;
   display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
}
.choose__card {
        opacity: 0; /* Mulai dengan tidak terlihat */
        transition: opacity 0.5s ease-in-out;
    }

      .choose__card.visible {
        opacity: 1; /* Tampilkan elemen */
        animation: slideInUp 0.5s ease-in-out forwards; /* Terapkan animasi masuk */
    }
/* Styling untuk kartu */
.choose__card span {
  display: inline-block;
  margin-bottom: 0.5rem;
  padding: 5px 10px;
  font-size: 1.25rem;
  background-color: #cad8d8;
  border-radius: 100%;

}

.choose__card h4 {
  margin-bottom: 1rem;
  font-size: 1rem;
  font-weight: 600;
  font-family: var(--header-font);
  color: var(--text-dark);
}

.choose__card p {
  color: var(--text-light);
}

.offer__container {
  padding-block: 5rem;
  display: grid;
  grid-template-columns:
    minmax(0, 1fr)
    minmax(0, var(--max-width))
    minmax(0, 1fr);
  row-gap: 2rem;

    opacity: 0; /* Mulai dengan tidak terlihat */
    transition: opacity 0.5s ease-in-out;

}

.offer__container.visible {
    opacity: 1; /* Tampilkan elemen */
    animation: fadeIn 1s ease-in-out; /* Terapkan animasi */
}

@keyframes fadeIn {
   0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.offer__grid__top {
  grid-column: 1/3;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2rem;
}
.offer__grid__top img {
  width: 100%; /* Gambar menyesuaikan grid */
  height: auto; /* Pertahankan proporsi gambar */
  margin-left: 10px;
  border-radius: 8px; /* Opsional: Estetika */
  transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animasi halus */
}

.offer__grid__top img:hover {
  transform: scale(1.05) translateY(-10px); /* Perbesar sedikit dan naik */
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
   /* Tambahkan bayangan */
}

.offer__grid__bottom {
  grid-column: 2/4; /* Sesuai struktur grid utama */
  display: grid;
  padding: 10px;

  grid-template-columns: repeat(4, 1fr); /* 4 kolom */
  gap: 2rem; /* Jarak antar elemen */
   /* Scroll horizontal jika konten melebihi lebar */
}

.offer__grid__bottom img {
  width: 100%; /* Gambar menyesuaikan grid */
  height: auto; /* Pertahankan proporsi gambar */
  border-radius: 8px; /* Opsional: Estetika */

  transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animasi halus */
}

.offer__grid__bottom img:hover {
  transform: scale(1.05) translateY(-10px); /* Perbesar sedikit dan naik */
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Tambahkan bayangan */
}

.offer__container img {
  border-radius: 10px;
  box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.2);
}

.offer__content {
  padding-right: 1rem;
}

.offer__content .section__subheader {
  margin-bottom: 2rem;
}

.craft__container {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2rem;
  align-items: center;
}

.craft__container .section__subheader {
  margin-bottom: 2rem;
}

.craft__image {
  position: relative;
  isolation: isolate;
}

.craft__image::before {
  position: absolute;
  content: "";
  bottom: 0;
  left: 0;
  width: 100%;
  height: 50%;
  background-color: #ebf1f1;
  border-radius: 15px;
  transition: 0.3s;
  z-index: -1;
}

.craft__image:hover::before {
  height: 80%;
}

.craft__image__content {
  padding-bottom: 2rem;
  text-align: center;
  transition: 0.3s;
}

.craft__image__content img {
  margin-bottom: 1rem;
  max-width: 250px;
  margin: auto;
}

.craft__image__content p {
  font-size: 1rem;
  font-weight: 500;
  color: var(--text-dark);
}

.craft__image__content h4 {
  font-size: 1.2rem;
  font-weight: 600;
  color: var(--text-dark);
}

.craft__image:hover .craft__image__content {
  transform: translateY(-2rem);
}

.craft__image a {
  position: absolute;
  left: 50%;
  bottom: 10px;
  transform: translate(-50%, 50%);
  padding: 0 7px;
  font-size: 1.75rem;
  color: var(--white);
  background-color: var(--primary-color);
  border-radius: 100%;
  box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.2);
  opacity: 0;
  transition: 0.3s;
}

.craft__image:hover a {
  opacity: 1;
}

.modern__container {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 10rem;
}


.ticket-section {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 50px 5%;
  gap: 3rem;
}

.ticket-content {
  flex: 1;
  max-width: 50%;
  margin-left:120px;
  text-align:left;
}

.ticket-title {
  font-size: 32px;
  font-weight: bold;
  color: #000;
  margin-bottom: 30px;
}

.ticket-highlight {
  color:rgb(0, 82, 213); /* Warna biru untuk kata "Terbaik!" */
}

.ticket-features {
  display: flex;
  justify-content: space-between;
}

.ticket-feature-left {
  width: 60%; /* Kolom kiri dengan 3 fitur */
}

.ticket-feature-right {
  width: 35%; /* Kolom kanan dengan 2 fitur */
}

.ticket-feature {
  margin-bottom: 20px;
}

.ticket-checkmark {
  color: blue;
  margin-right: 10px;
}



.ticket-image {
  flex: 1;
  display: flex;
  justify-content: flex-end;
}

.ticket-img {
  width: 150%; /* Lebih besar dari area normal */
  max-width: 1000px; /* Ukuran maksimum lebih besar */
  height: auto;
  transform: scale(1.4); /* Memperbesar gambar */
  margin-right: 150px; /* Menambah jarak ke kanan */
}




.modern__bg {
  position: absolute;
  right: 0;
  top: -4rem;
  opacity: 0.5;
}

.modern__img-1 {
  position: absolute;
  border-radius: 10px;
}

.modern__img-1 {
  max-width: 900px;
}


.modern__grid {
  margin-block: 2rem;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 2rem;
}

.modern__card {
  display: flex;
  gap: 1rem;
}

.modern__card span {
  font-size: 0.8rem;
  font-weight: 800;
  color: var(--text-dark);
}

.modern__card p {
  color: var(--text-light);
}

.blog__grid {
  margin-top: 4rem;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 2rem;

}

.blog__card {
  transition: transform 0.3s ease;
}

.blog__card:hover {
  transform: scale(1.05);
}

.blog__card img {
  margin-bottom: 1rem;
  border-radius: 10px;
  box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.2);

}

.blog__card h4 {
  font-size: 1.2rem;
  font-weight: 600;
  color: var(--text-dark);
}

.blog__card p {
  font-weight: 500;
  color: var(--text-dark);
}

.blog__card p span {
  font-weight: 400;
  font-style: italic;
  color: var(--text-light);
}

.footer {
  background-color: #000957;
}

.footer__container {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 5rem;
  align-items: center;
  border-bottom: 1px solid var(--white);
}

.footer__content h4 {
  margin-bottom: 1rem;
  font-size: 2rem;
  font-weight: 600;
  line-height: 2.5rem;
  color: var(--white);
}

.footer__content p {
  color: var(--white);
}

.footer__form form {
  width: 100%;
  max-width: 600px;
  margin-inline: auto;
  padding: 5px;
  display: flex;
  align-items: center;
  gap: 1rem;
  background-color: var(--white);
  border-radius: 10px;
}

.footer__form input {
  width: 100%;
  padding: 0 1rem;
  outline: none;
  border: none;
  font-size: 1rem;
}

.footer__form button {
  padding: 1rem 1.5rem;
  outline: none;
  border: none;
  font-size: 1.2rem;
  color: var(--white);
  background-color: var(--primary-color);
  border-radius: 5px;
}

.footer__bar {
  padding-block: 2rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 2rem;
}

.footer__logo h4 a {
  font-size: 1.5rem;
  font-weight: 600;
  font-family: var(--header-font);
  color: var(--white);
}

.footer__logo p {
  margin-top: 5px;
  font-size: 0.8rem;
  color: var(--white);
}

.footer__nav {
  list-style: none;
  display: flex;
  align-items: center;
  gap: 2rem;
}

.footer__link a {
  font-weight: 500;
  color: var(--white);
  white-space: nowrap;
}

@media (width < 1200px) {
  .offer__container {
    row-gap: 1rem;
  }


  .craft__container {
    gap: 1rem;
  }
}

@media (width < 900px) {
  .nav__actions {
    display: none;
  }

   @keyframes slideInUp {
        0% {
            transform: translateY(30px);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes slideOutDown {
        0% {
            transform: translateY(0);
            opacity: 1;
        }
        100% {
            transform: translateY(30px);
            opacity: 0;
        }
    }

  .choose__container {
    grid-template-columns: repeat(1, 1fr);
     opacity: 0; /* Mulai dengan tidak terlihat */
        transition: opacity 0.5s ease-in-out;
  }
   .choose__container.visible {
        opacity: 1; /* Tampilkan elemen */
        animation: slideInUp 1s ease-in-out forwards; /* Terapkan animasi masuk */
    }


  .choose__container .choose__bg {
    left: 0;
    transform: translateX(0);
  }

  .choose__image {
    grid-area: 1/1/2/2;
  }


  .craft__container {
    grid-template-columns: repeat(2, 1fr);
  }

  .modern__container {
    grid-template-columns: repeat(1, 1fr);
    gap: 4rem;
  }

  .blog__grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
  }

  .footer__container {
    grid-template-columns: repeat(1, 1fr);
    text-align: center;
  }
}

@media (width < 600px) {
  nav {
    position: fixed;
    width: 100%;
    padding: 1rem;
    background-color: #000000;
    z-index: 99;
  }

  .nav__links {
    position: absolute;
    left: 0;
    top: 68px;
    padding: 2rem;
    width: 100%;
    flex-direction: column;
    transform: scaleY(0);
    transform-origin: top;
    transition: 0.5s;
    background-color: rgba(0, 0, 0, 0.9);
  }

  .nav__links .link a {
    opacity: 0;
  }

  .nav__links.open .link a {
    opacity: 1;
  }

  .nav__links.open {
    transform: scaleY(1);
  }

  .nav__menu__btn {
    display: block;
  }

  .header__container h1 {
    margin-top: 4rem;
    font-size: 3.5rem;
  }


  .blog__grid {
    grid-template-columns: repeat(1, 1fr);
    row-gap: 2rem;
  }

  .footer__bar {
    flex-direction: column;
  }
}



/* google-font */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

/* variable-css */
:root{
    --header-height:3.5rem;

    /* coolor */

    --first-color:hsl(228, 66%,53%);
    --first-color-alt:hsl(228, 66%,47%);
    --first-color-light:hsl(228, 62%,59%);
    --first-color-lighten:hsl(228, 100%,97%);
    --second-color:hsl(25, 83%,53%);
    --title-color:hsl(228, 57%,28%);
    --text-color:hsl(228, 15%,50%);
    --text-color-light:hsl(228, 12%, 75%);
    --border-color:hsl(228, 99%,98%);
    --body-color:#fff;
    --container-color:#fff;

/* font-and-typografi */

    --body-font:'Poppins', sans-serif;
    --biggest-font-size:2.25rem;
    --h1-font-size:1.5rem;
    --h2-font-size:1.25ren;
    --h3-font-size:1rem;
    --normal-font-size: .938rem;
    --small-font-size: .813rem;
    --smaller-font-size: .75rem;

/* font-weight */
    --font-medium:500;
    --font-semi-bold:600;

    /* z-index */
    --z-tooltip:10;
    --z-fixed:100;
}

/* responive-typography */
    @media screen and (min-width: 1024px){
     :root{
    --biggest-font-size:4rem;
    --h1-font-size:2.25rem;
    --h2-font-size:1.5ren;
    --h3-font-size:1.23rem;
    --normal-font-size: 1rem;
    --small-font-size: .875rem;
    --smaller-font-size: .813rem;
     }
    }

    /* base */
    *{
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    html{
        scroll-behavior: smooth;
    }

    body{
        font-family: var(--body-font);
        font-size: var(--normal-font-size);
        background-color: var(--body-color);
        color: var(--text-color);
        transition: .3s; /* for animation dark mode*/
    }

    h1,h2,h3{
        color: var(--title-color);
        font-weight: var(--font-semi-bold);
    }

    ul{
        list-style: none;
    }

    a{
        text-decoration: none;
    }

    img{
        max-width: 100%;
        height: auto;
    }

    input,
    button{
        font-family: var(--body-font);
        outline: none;
        border: none;
    }

 /* THEME */
    .change-theme{
        font-size: 1.25rem;
        color: #fff;
        cursor: pointer;
        transition: .3s;
    }

    .change-theme:hover{
        color: var(--first-color);
    }

/* variable-dark-themes */
body.dark-theme{
    --first-color:hsl(228, 66%,62%);
    --second-color:hsl(25, 57%, 54%);
    --title-color:hsl(228, 8%, 95%);
    --text-color:hsl(228, 8%, 70%);
    --border-color:hsl(228, 16%, 14%);
    --body-color: hsl(228, 12%, 8%);
    --container-color:hsl(228, 16%, 12%);
}

/*
 color change in some parts pff
the wesite, in the dark
*/
.dark-theme .home__search,
.dark-theme .swiper-button-next,
.dark-theme .swiper-button-prev{
    border: 3px solid var(--border-color);
}

.dark-theme .nav__menu,
.dark-theme .home__img,
.dark-theme .popular__card:hover,
.dark-theme .value__img,
.dark-theme .accordion-open,
.dark-theme .accordion-open .value__accordion-icon,
.dark-theme .accordion-open .value__accordion-arrow,
.dark-theme .contact__img,
.dark-theme .contact__card-box:hover,
.dark-theme .scrollup{
    box-shadow: none;
}

.dark-theme .value__orbe,
.dark-theme .value__accordion-icon,
.dark-theme .value__accordion-arrow,
.dark-theme .contact__orbe,
.dark-theme .contact__card i,
.dark-theme .contact__card-button,
.dark-theme .subscribe__container{
    background-color: var(--container-color);
}

    .dark-theme .subscribe__container{
        border:  6px solid var(--border-color);
    }

    .dark-theme .subscribe__description{
        color: var(--text-color);
    }

    .dark-theme::-webkit-scrollbar{
        background-color: hsl(228, 4%, 15%);
    }

    .dark-theme::-webkit-scrollbar-thumb{
        background-color: hsl(228, 4%, 25%);
    }

    .dark-theme::-webkit-scrollbar-thumb:hover{
        background-color: hsl(228, 4%, 35%);
    }

    /* reuseable-css-classes */
    .container{
        max-width: 1024px;
        margin-left: 1.5rem;
        margin-right: 1.5rem;
    }

    .grid{
        display: grid;
    }

    .section{
        padding: 4.5rem 0 2rem;
    }

    ;.section__title{
        font-size: var(--h2-font-size);
        margin-top: 1rem;
    }

    .section__title span{
        color: var(--second-color);
    }

    .section__subtitle{
        display: block;
        font-size: var(--smaller-font-size);
        color: var(--second-color);
    }

    main{
        overflow: hidden;
    }

    /* header&nav */
    .header{
        position: relative;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #080113;

        transition: .4s;
    }

    .nav{
        height: var(--header-height);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .nav__logo{
        color: #fff;
        display: inline-flex;
        align-items: center;
        column-gap: .25rem;
        font-weight: var(--font-medium);
        transition: .3s;
        margin:0;
    }

    .nav__logo i{
        font-size: 1rem;
        margin:0;
    }

    .nav__logo:hover{
        color: var(--first-color);
    }

    @media  screen and (max-width:1023px) {
        .nav__menu{
            position: fixed;
            bottom: 2rem;
            background-color: var(--container-color);
            box-shadow: 0 8px 24px hsla(228, 66%, 45%, .15);
            width: 90%;
            left: 0;
            right: 0;
            margin: 0 auto;
            padding: 1.30rem 3rem;
            border-radius: 1.25rem;
            transition: .4s;
        }

        .nav__list{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav__link{
            color: var(--text-color);
            display: flex;
            padding: .5rem;
            border-radius: 50%;
        }

        .nav__link i{
            font-size: 1.25rem;
        }

        .nav__link span{
            display: none;
        }
    }

/* change-background */
    .scroll-header{
         background-color: var(--body-color);
        box-shadow: 0 1px 4px hsla(228, 4%, 15%, .1);
    }

    .scroll-header .nav__logo{
        color: var(--first-color);

    }

    .scroll-header .change-theme{
        color: var(--title-color);
    }

    /* avtive link */
    .active-link{
        background: linear-gradient(101deg,
                    hsl(228, 66%, 53%),
                    hsl(228, 66%, 47%));
        color: #fff;
        box-shadow: 0 4px 8px hsla(228, 66%, 25%, .25);
    }

    /* home */
    .home{
        background: linear-gradient(170deg,
        hsl(0, 0%,22%)0%,
        hsl(0, 0%,6%)30%);
    padding-bottom: 0;
    }

    .home__container{
        padding-top: 4rem;
        row-gap: 3.5rem;
    }

    .home__title,
    .home__value-number{
        color: #ffffff;
    }

    .home__title{
        font-size: var(--biggest-font-size);
        line-height: 120%;
        margin-bottom: 1.25rem;
    }

    .home__description{
        color: var(--text-color-light);
        margin-bottom: 2rem;
    }

    .home__search{
        background-color: var(--body-color);
        padding: .35rem .35rem .35rem .75rem;
        display: flex;
        align-items: center;
        border-radius: .75rem;
        border: 3px solid var(--text-color-light);
        margin-bottom: 2rem;
    }

    .home__search i{
        font-size: 1.25rem;
        color: var(--first-color);
    }

    .home__search-input{
        width: 90%;
        background-color: var(--body-color);
        color: var(--text-color);
        margin: 0 .5rem;
    }

    .home__search-input::placeholder{
        color: var(--text-color-light);
    }

    .home__value{
        display: flex;
        column-gap: 2.5rem;
    }

    .home__value-number{
        font-size: var(--h1-font-size);
        font-weight: var(--font-medium);
    }

    .home__value-number span{
        color: var(--second-color);
    }

    .home__value-description{
        display: flex;
        color: var(--text-color-light);
        font-size: var(--smaller-font-size);
    }

    .home__images{
        position: relative;
        display: flex;
        justify-content: center;
    }

    .home__orbe{
        width: 265px;
        height: 284px;
        background: linear-gradient(180deg,
                  hsl(0, 0%, 16%)93%,
                hsl(0, 0%, 67%)100%);
        border-radius: 135px 135px 0 0;
    }

    .home__img{
        position: absolute;
        width: 250px;
        height: 300px;
        overflow: hidden;
        border-radius: 125px 125px 12px 12px;
        display: inline-flex;
        align-items: flex-end;
        bottom: -1.5rem;
        box-shadow: 0 16px 32px hsla(228, 66%, 25%, .25);
    }

    /* button */
    .button{
        display: inline-block;
        background: linear-gradient(101deg,
                    hsl(228, 66%, 53%),
                    hsl(228,66%, 47%));
        color: #fff;
        padding: 14px 28px;
        border-radius: .5rem;
        font-size: var(--normal-font-size);
        font-weight: var(--font-medium);
        box-shadow: 0 4px 8px hsla(228, 66%, 45%, .25);
        transition: .3s;
        cursor: pointer;
    }

    .button:hover{
        box-shadow: 0 4px 12px hsla(228, 66%, 45%, .25);
    }

    .nav__button{
        display: none;
    }

    /* logos */
    .logos__container{
        padding-top: 2rem;
        grid-template-columns: repeat(2, 1fr);
        gap: 3rem 2rem;
        justify-items: center;
    }

    .logos__img img{
        height: 60px;
        opacity: .3;
        transition: .3s;
    }

    .logos__img img:hover{
        opacity: .6;
    }

    /* popular */
    .popular__container{
        padding: 1rem 0 5rem;
    }

    .popular__card{
        width: 290px;
        background-color: var(--container-color);
        padding: .5rem .5rem 1.5rem;
        border-radius: 1rem;
        margin: 0 auto;
        transition: .4s;
    }

    .popular__img{
        border-radius: 1rem;
        margin-bottom: 1rem;
    }

    .popular__data{
        padding: 0 1rem 0 .5rem;
    }

    .popular__price{
        font-size: var(--h2-font-size);
        color: var(--text-color);
        margin-bottom: .25rem;
    }

    .popular__price span{
        color: var(--second-color);
    }

    .popular__title{
        font-size: var(--h3-font-size);
        margin-bottom: .75rem;
    }

    .popular__description{
        font-size: var(--small-font-size);
    }

    .popular__card:hover{
        box-shadow: 0 12px 16px hsla(228, 66%, 45%, .1);
    }

    /* swipper-class */
    .swiper-button-prev::after,
    .swiper-button-next::after{
        content: '';
    }

    .swiper-button-next,
    .swiper-button-prev{
        top: initial;
        bottom: 0;
        width: initial;
        height: initial;
        background-color: var(--container-color);
        border: 2px solid var(--text-color-light);
        padding: 6px;
        border-radius: .5rem;
        font-size: 1.5rem;
        color: var(--first-color);
    }

    .swiper-button-prev{
        left: calc(50% - 3rem);
    }

    .swiper-button-next{
        right: calc(50% - 3rem);
    }

    /* value */
    .value__container{
        row-gap: 3rem;
    }

    .value__images{
        position: relative;
        display: flex;
        justify-content: center;
    }

    .value__orbe{
        width: 266px;
        height: 316px;
        background-color: hsl(228, 24%, 97%);
        border-radius: 135px 135px 16px 16px;
    }

    .value__img{
        position: absolute;
        width: 250px;
        height: 300px;
        overflow: hidden;
        border-radius: 125px 125px 12px 12px;
        inset: 0;
        margin: auto;
        box-shadow: 0 16px 32px hsla(228, 66%, .25);
    }

    .value__description{
        font-size: var(--small-font-size);
        margin-bottom: 2rem;
    }

    .value__accordion{
        display: grid;
        row-gap: 1.5rem;
    }

    .value__accordion-item{
        background-color: var(--body-color);
        border: 2px solid var(--border-color);
        border-radius: .5rem;
        padding: 1rem .75rem;
    }

    .value__accordion-header{
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .value__accordion-icon{
        background-color: var(--first-color-lighten);
        padding: 5px;
        border-radius: .25rem;
        font-size: 18px;
        color: var(--first-color);
        margin-right: .75rem;
        transition: .3s;
    }

    .value__accordion-title{
        font-size: var(--small-font-size);
    }

    .value__accordion-arrow{
        display: inline-flex;
        background-color: var(--first-color-lighten);
        padding: .25rem;
        color: var(--first-color);
        border-radius: 2px;
        font-size: 10px;
        margin-left: auto;
        transition: .3s;
    }

    .value__accordion-arrow i{
        transition: .4s;
    }

    .value__accordion_description{
        font-size: var(--smaller-font-size);
        padding: 1.25rem 2.25rem 0 2.7rem;
    }

    .value__accordion-content{
        overflow: hidden;
        height: 0;
        transition: all .25s ease;
    }

    /* rotate icons and shadow */
    .accordion-open{
        box-shadow: 0 12px 32px hsla(228, 66%, 45%, .1);
    }

    .accordion-open .value__accordion-icon{
        box-shadow: 0 4px 4px hsla(228, 66%, 45%, .1);
    }

    .accordion-open .value__accordion-arrow{
        box-shadow: 0 2px 4px hsla(228, 66%, 45%, .1);
    }

    .accordion-open .value__accordion-arrow i{
        transform: rotate(-180deg);
    }

    /* contact */
    .contact__container{
        row-gap: 2rem;
    }

    .contact__images{
        position: relative;
        display: flex;
        justify-content: center;
    }

    .contact__orbe{
        width: 266px;
        height: 316px;
        background-color: hsl(228, 24%, 97%);
        border-radius: 135px 135px 16px 16px;
    }

    .contact__img{
        position: absolute;
        width: 250px;
        height: 300px;
        overflow: hidden;
        border-radius: 125px 125px 12px 12px;
        inset: 0;
        margin: auto;
        box-shadow: 0 16p 32px hsla(228, 66%, 25%, .25);
    }

    .contact__description{
        font-size: var(--small-font-size);
        margin-bottom: 2.5rem;
    }

    .contact__card{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.25rem .75rem;
    }

    .contact__card-box{
        background-color: var(--body-color);
        border: 2px solid var(--border-color);
        padding: 1.25rem .75rem;
        border-radius: .5rem;
        transition: .3s;
    }

    .contact__card-info{
        display: flex;
        align-items: flex-start;
        column-gap: .75rem;
        margin-bottom: 1.25rem;
    }

    .contact__card i{
        padding: 6px;
        background-color: var(--first-color-lighten);
        border-radius: 6px;
        font-size: 1.25rem;
        color: var(--first-color);
    }

    .contact__card-title{
        font-size: var(--normal-font-size);
    }

    .contact__card-description{
        font-size: var(--smaller-font-size);
    }

    .contact__card-button{
        font-size: var(--smaller-font-size);
        padding: 14px 0;
        width: 100%;
        border-radius: .25rem;
        background: var(--first-color-lighten);
        color: var(--first-color);
        font-weight: var(--font-semi-bold);
        box-shadow: none;
    }

    .contact__card-button:hover{
        background-color: var(--first-color);
        color: #fff;
    }

    .contact__card-box:hover{
        box-shadow: 0 8px 24px hsla(228, 66%, 45%, .1);
    }

    /* suscribe */
    .subscribe{
        padding: 2.5rem 0;
    }

    .subscribe__container{
        background-color: var(--first-color);
        padding: 3rem 2rem;
        border-radius: 1.25rem;
        border: 6px solid var(--first-color-light);
        text-align: center;
    }

    .subscribe__title{
        font-size: var(--h2-font-size);
        color: #fff;
        margin-bottom: 1rem;
    }

    .subscribe__description{
        color: hsl(228, 90%, 92%);
        font-size: var(--small-font-size);
        margin-bottom: 2rem;
    }

    .subscribe__button{
        border: 2px solid #fff;
        background: var(--first-color-light);
        font-size: var(--small-font-size);
    }

    .subscribe__button:hover{
        background-color: var(--first-color);
    }

    /* footer */
    .footer__container{
        row-gap: 2.5rem;
    }

    .footer__logo{
        color: var(--first-color);
        font-size: var(--h3-font-size);
        font-weight: var(--font-semi-bold);
        display: inline-flex;
        align-items: center;
        column-gap: .25rem;
        margin-bottom: .75rem;
    }

    .footer__logo i{
        font-size: 1.25rem;
    }

    .footer__description,
    .footer__link{
        font-size: var(--small-font-size);
        font-weight: var(--font-medium);
    }

    .footer__content,
    .footer__links{
        display: grid;
    }

    .footer__content{
        grid-template-columns: repeat(2, max-content);
        gap: 2.5rem 4rem;
    }

    .footer__title{
        font-size: var(--h3-font-size);
        margin-bottom: 1rem;
    }

    .footer__links{
        row-gap: .5rem;
    }

    .footer__link{
        color: var(--text-color);
        transition: .3s;
    }

    .footer__link:hover{
        color: var(--title-color);
    }

    .footer__social{
        display: flex;
        column-gap: 1rem;
    }

    .footer__social-link{
        font-size: 1.25rem;
        color: var(--text-color);
        transition: .3s;
    }

    .footer__social-link:hover{
        color: var(--title-color);
    }

    .footer__info,
    .footer__privacy{
        display: flex;
    }

    .footer__info{
        padding-bottom: 6rem;
        margin-top: 5.5rem;
        flex-direction: column;
        text-align: center;
        row-gap: 1.5rem;
    }

    .footer__copy,
    .footer__privacy a{
        font-size: var(--smaller-font-size);
        font-weight: var(--font-medium);
        color: var(--text-color);
    }

    .footer__privacy{
        justify-content: center;
        column-gap: 1.25rem;
    }

    /* scrol-bar */
    ::-webkit-scrollbar{
        width: .6rem;
        border-radius: .5rem;
        background-color: hsl(228, 8%, 76%);
    }

    ::-webkit-scrollbar-thumb{
        background-color: hsl(228, 8%, 65%);
        border-radius: .5rem;
    }

    ::-webkit-scrollbar-thumb:hover{
        background-color: hsl(228, 8%, 54%);
    }

    /* scroll-up */
    .scrollup{
        position: fixed;
        right: 1rem;
        bottom: -30%;
        background-color: var(--container-color);
        box-shadow: 0 8px 12px hsla(228, 66%, 45%, .1 );
        display: inline-flex;
        padding: .35rem;
        border-radius: .25rem;
        color: var(--title-color);
        font-size: 1.25rem;
        z-index: var(--z-tooltip);
        transition: .3s;
    }

    .scrollup:hover{
        transform: translate(-.25rem);
        color: var(--first-color);
    }

    /* show-scroll-up */
    .show-scroll{
        bottom: 8rem;
    }
    /* breakpoints */
    /* for small devices */
    @media screen and (max-width: 350px) {
    .container{
        margin-left: 1rem;
        margin-right: 1rem;
    }

    .section{
        padding: 3.5rem 0 1rem;
    }

    .home{
        padding-bottom: 0;
    }

    .contact__card{
        grid-template-columns: repeat(1, 180px);
        justify-content: center;
    }
}

@media screen and (max-width: 320px) {
    .nav__menu{
        padding: 1.3rem 1.5rem;
    }

    .home__value{
        column-gap: 1rem;
    }
    .home__img{
        width: 220px;
        height: 280px;
    }
    .home__orbe{
        width: 240px;
        height: 264px;
    }

    .logos__container{
        gap: 2rem 1rem;
    }

    .popular__card{
        width: 230px;
        padding: .5rem .5rem .75rem;
    }

    .value__img,
    .contact__img{
        width: 220px;
        height: 260px;
    }
    .value__orbe,
    .contact__orbe{
        width: 236px;
        height: 280px;
    }

    .subscribe__container{
        padding:  2rem 1rem;
    }

    .footer__content{
        gap: 2.5rem;
    }
}

/* for medium divices */
@media screen and (min-width: 576px){
    .nav__menu{
        width: 342px;
    }

    .home__search{
        width: 412px;
    }

    .contact__card{
        grid-template-columns: repeat(2, 192px);
        justify-content: center;
    }

    .footer__content{
        grid-template-columns: repeat(3, max-content);
    }
}

@media screen and (min-width: 767px){
    .home__container{
        grid-template-columns: repeat(2, 1fr);
        padding-top: 2rem;
    }
    .home__orbe{
        align-self: flex-end;
    }
    .home__data{
        padding-bottom: 2rem;
    }

    .logos__container{
        grid-template-columns: repeat(4, max-content);
        justify-content: center;
    }

    .value__container,
    .contact__container{
        grid-template-columns: repeat(2, 1fr);
        align-items: center;
    }

    .contact__images{
        order: 1;
    }
    .contact__card{
        justify-content: initial;
    }

    .subscribe__container{
        padding: 3rem 13rem;
    }

        .footer__container{
            grid-template-columns: repeat(2, max-content);
            justify-content: space-between;
        }
}

/* for large devices */
@media screen and (min-width: 1023px) {
.section{
    padding: 7.5rem 0 1rem;
}
.section__title{
    font-size: 2.25rem;
}
.section__subtitle{
    font-size: var(--normal-font-size);
}
.nav{
    height: calc(var(--header-height) + 1.5rem);


}
.nav__menu{
    width: initial;
    margin-left: auto;
}
.nav__list{
    display: flex;
    column-gap: 3rem;
}
.nav__link{
    color: var(--text-color-light);
}
.nav__link i{
    display: none;
}
.nav__button{
    display: inline-block;
}

.active-link{
    background: none;
    box-shadow: none;
    color: var(--first-color);
    font-weight: var(--font-medium);
}

.change-theme{
    margin: 0 3rem;
    color: var(--text-color-light);
}

.scroll-header .nav__link,
.scroll-header .change-theme{
    color: var(--text-color);
}
.scroll-header .active-link{
    color: var(--first-color);
}

.home{
    padding-bottom: 0;
}
.home__container{
    padding-top: 5rem;
    column-gap: 2rem;
}
.home__data{
    padding-bottom: 4rem;
}
.home__title{
    margin-bottom: 2rem;
}
.home__description,
.home__search{
    margin-bottom: 3rem;
}
.home__value{
    column-gap: 3.5rem;
}
.home__orbe{
    width: 504px;
    height: 611px;
    border-radius: 256px 256px 0 0;
}
.home__img{
    width: 472px;
    height: 634px;
    border-radius: 236px 236px 12px 12px;
    bottom: -2.5rem;
}

.logos__img{
    height: 100px;
}

.popular__container{
    padding-top: 3rem;
}
.popular__card{
    width: 320px;
    padding: .75rem .75rem 2rem;
}
.popular__data{
    padding: 0 .25rem 0 .75rem;
}

.value__container,
.contact__container{
    align-items: flex-start;
    column-gap: 5rem;
}
.value__orbe,
.contact__orbe{
    width: 501px;
    height: 641px;
    border-radius: 258px 258px 16px 16px;
}
.value__img,
.contact__img{
    width: 461px;
    height: 601px;
    border-radius: 238px 238px 12px 12px;
}
.value__img img,
.contact__img img{
    max-width: initial;
    width: 490px;
}
.value__description,
.contact__description{
    font-size: var(--normal-font-size);
    margin-bottom: 2.5rem;
}

.value__accordion-title{
font-size: var(--normal-font-size);
}
.value__accordion-item{
    padding: 1.25rem 1.25rem 1.25rem 1rem;
}
.value__accordion_description{
    padding-bottom: 1rem;
    font-size: var(--small-font-size);
}

.contact__card{
    grid-template-columns: repeat(2, 200px);
}
.contact__card-box{
    padding: 28px 1.5rem 1.6rem;
}

.subscribe__container{
    padding: 4rem 10rem 4.5rem;
    border-radius: 2rem;
    border: 12px solid var(--first-color-light);
}
.subscribe__title{
    font-size: 2.5rem;
    margin-bottom: 1.5rem;
}
.subscribe__description{
    font-size: var(--normal-font-size);
    padding: 0 8rem;
}
.subscribe__button{
    font-size: var(--normal-font-size);
}

.footer__content{
    grid-template-columns: repeat(4, max-content);
}
.footer__title{
    margin-bottom: 1.5rem;
}
.footer__link{
    row-gap: 1rem;
}
.footer__info{
    flex-direction: row;
    justify-content: space-between;
    padding-bottom: 2rem;
}
.show-scroll{
    bottom: 3rem;
    right: 3rem;
}
}

@media screen and (min-width: 1040) {
    .container{
        margin-left: auto;
        margin-right: auto;
    }
}


        header {

        }

        header h1 {
            font-size: 1.8rem;
        }

        header nav a {
            text-decoration: none;
            color: #fff;
            margin: 0 15px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        header nav a:hover {
            color: #f4d03f;
        }

        .hero {
            text-align: center;
            padding: 100px 20px;
        }

        .hero h2 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .hero button {
            padding: 15px 30px;
            font-size: 1rem;
            color: #141e30;
            background-color: #f4d03f;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: bold;
        }

        .hero button:hover {
            background-color: #f1c40f;
        }

        .events {
            padding: 50px 20px;
            text-align: center;
        }

        .events h3 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .events .event {
            display: inline-block;
            width: 300px;
            margin: 20px;
            background-color: #fff;
            color: #141e30;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .events .event img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .events .event .info {
            padding: 15px;
        }

        .events .event .info h4 {
            margin: 0 0 10px;
            font-size: 1.2rem;
        }

        .events .event .info p {
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .events .event .info button {
            padding: 10px 20px;
            font-size: 0.9rem;
            color: #fff;
            background-color: #141e30;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .events .event .info button:hover {
            background-color: #243b55;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8);
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
        }

        .trail {
  position: absolute;
  width: 10px;
  height: 10px;
  background: rgba(0, 89, 255, 0.7);
  border-radius: 50%;
  pointer-events: none;
  animation: fade 0.8s ease-out forwards;
}

@keyframes fade {
  0% {
    opacity: 1;
    transform: scale(1);
  }
  100% {
    opacity: 0;
    transform: scale(3);
  }
}

.background-container {
    position: relative;
    width: 100%;
    height: 100%;
}

.bg-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    object-fit: cover;
    opacity: 10%;
}

.section__container, .ticket-section {
    position: relative;
    z-index: 1;
}




    </style>
</head>
<body>

<header class="header" id="header">
      <nav class="nav">
      <img src="assets/removebg.png" alt="" style="width: 50px; height: auto;"/>
          <a href="#" class="nav__logo" style="font-family: 'Poppins', sans-serif;  font-weight: 600;  font-size: 24px; ">
              IBESTIX <i class="bx bxs-home-alt-2"></i>
          </a>
          <div class="mr-8">
          <!-- Themechange button -->
          <a href="{{ route('dashboard') }}">
            Home
          </a>

<a href="{{ route('lainya.index') }}">
    Jelajahi
</a>

          </div>
          @if (Route::has('login'))

                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Dashboard</a>
                            @else

                            <a
                                    href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Log in
                                </a>
                              <div class="text-white">|</div>
                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Register
                                    </a>
                                @endif
                            @endauth

                    @endif
      </nav>
  </header>

    <div class="section__container header__container" id="home">
    <video autoplay muted loop playsinline class="background-video">
    <source src="assets/bgvideo.mp4" type="video/mp4" />
    Your browser does not support the video tag.
  </video>
      <h1>Mulai petualangan musik di sini dengan  cepat</h1>
      <p>
        Temukan konser musik yang kamu sukai dengan mudah melalui platform kami gengz.
        Kami menawarkan akses cepat dan aman untuk berbagai konser dari artis ternama di seluruh dunia.
      </p>
      <a href="#choose"><i class="ri-arrow-down-double-line"></i></a>
    </div>
<!-- Jelajahi Konser Section with improved responsiveness -->
<div class="container mx-auto px-4 pt-16 sm:pt-24 md:pt-32 pb-8 sm:pb-12 md:pb-16">
    <!-- Top section with grid layout -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6 md:gap-8 mb-8 sm:mb-12 md:mb-16">
        <!-- Left column with heading -->
        <div class="md:col-span-1 text-center md:text-left mb-8 md:mb-0">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">Jelajahi Konser</h2>
            <div class="h-3 sm:h-4"></div>
            <p class="text-sm sm:text-base text-gray-600 mb-6 sm:mb-8">
                Eksplor tiket konsermu sekarang <br>
                hanya di vibestix
            </p>
            
            <div class="text-center md:text-left">
                <a href="{{ route('product.index') }}" class="inline-block text-white px-6 sm:px-8 py-2 sm:py-3 rounded-full text-sm sm:text-base font-medium transition duration-300" style="background-color: #241CE6;">
                    Jelajahi Sekarang
                </a>
            </div>
        </div>
        
        <!-- Right column with scrolling cards -->
        <div class="md:col-span-2 overflow-hidden">
            <div class="scroller flex gap-3 sm:gap-4 pb-4 overflow-x-auto">
                <!-- Original cards -->
                @foreach ($populer as $index => $knsr)
                    <a href="{{ route('product.show', $knsr->konser->id) }}" class="flex-none concert-card">
                        <div class="w-36 h-36 sm:w-40 sm:h-40 md:w-48 md:h-48 relative overflow-hidden rounded-lg shadow-md transition-all duration-300">
                            <img src="{{ asset('storage/' . $knsr->konser->image) }}" 
                                 alt="{{ $knsr->konser->nama }}" 
                                 class="w-full h-full object-cover">
                            
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                                <div class="z-10 text-center">
                                    <div class="absolute bottom-0 left-0 right-0 p-2 sm:p-3 bg-gradient-to-t from-black/70 to-transparent">
                                        <h3 class="text-white text-center text-xs sm:text-sm md:text-base font-bold truncate px-1">{{ $knsr->konser->nama }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                
                <!-- Duplicate cards for continuous scrolling -->
                @foreach ($populer as $index => $knsr)
                    <a href="{{ route('product.show', $knsr->konser->id) }}" class="flex-none concert-card">
                        <div class="w-36 h-36 sm:w-40 sm:h-40 md:w-48 md:h-48 relative overflow-hidden rounded-lg shadow-md transition-all duration-300">
                            <img src="{{ asset('storage/' . $knsr->konser->image) }}" 
                                 alt="{{ $knsr->konser->nama }}" 
                                 class="w-full h-full object-cover">
                            
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                                <div class="z-10 text-center">
                                    <div class="absolute bottom-0 left-0 right-0 p-2 sm:p-3 bg-gradient-to-t from-black/70 to-transparent">
                                        <h3 class="text-white text-center text-xs sm:text-sm md:text-base font-bold truncate px-1">{{ $knsr->konser->nama }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    /* Continuous horizontal scrolling animation */
    .scroller {
        animation: scrollHorizontal 30s linear infinite;
        min-width: 100%; /* Ensure it covers the full width */
        width: max-content; /* Ensure it fits all content */
    }
    
    @keyframes scrollHorizontal {
        0% {
            transform: translateX(0%);
        }
        100% {
            transform: translateX(-50%); /* Move exactly half the distance to loop seamlessly */
        }
    }
    
    /* Pause animation on hover */
    .scroller:hover {
        animation-play-state: paused;
    }
    
    /* Smooth hover effect for cards */
    .concert-card {
        transition: transform 0.3s ease;
    }
    
    .concert-card:hover {
        transform: scale(1.05);
        z-index: 10;
    }
    
    /* Hide scrollbar but keep functionality */
    .overflow-x-auto::-webkit-scrollbar {
        display: none;
    }
    
    .overflow-x-auto {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    
    /* Media query for touch devices to improve experience */
    @media (hover: none) {
        .scroller {
            animation-play-state: paused;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
    }
</style>
    
    <div class="background-container">
    <img src="assets/bgpoly.png" alt="" class="bg-image">

    <section class="section__container choose__container" id="choose">
    <div class="choose__image">
        <img src="assets/1.jpg" alt="choose" />
      </div>
      <div class="choose__content">
        <h2 class="section__header">Vibestix</h2>
        <p class="section__subheader">
          Dapatkan tiket untuk konser favoritmu dengan mudah melalui platform kami gengz.
          Kami menawarkan akses cepat dan aman untuk berbagai konser dari artis ternama di seluruh dunia.
        </p>
        <div class="choose__grid">
          <div class="choose__card">
            <span><i class="ri-truck-line"></i></span>
            <h4>Pemesanan Tiket yang Cepat dan Aman</h4>
            <p>
              Menyediakan proses pemesanan tiket yang user friendly, memudahkan user memesan tiket
            </p>
          </div>
          <div class="choose__card">
            <span><i class="ri-shopping-bag-3-line"></i></span>
            <h4>Tampilan Acara Interaktif Dan Seru</h4>
            <p>
              Menampilkan Banyak Line Up Artis dan Band Kelas Lokal dan Internasional
            </p>
          </div>
          <div class="choose__card">
            <span><i class="ri-customer-service-2-line"></i></span>
            <h4>24/7 Support</h4>
            <p>
              Rasakan ketenangan pikiran dengan mengetahui bahwa tim kami
              yang berdedikasi tersedia sepanjang waktu
            </p>
          </div>
          <div class="choose__card">
            <span><i class="ri-loop-right-line"></i></span>
            <h4>konser terpercaya
            </h4>
            <p>
                menyediakan banyak konser terpercaya yang siap untuk anda nikmati disela Waktu anda
            </p>
          </div>
        </div>
      </div>
    </section>

    <style>
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .ticket-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            opacity: 0; /* Mulai dengan tidak terlihat */
            transition: opacity 0.5s ease-in-out;
            padding: 40px;
            background-color: #f9f9f9; /* Latar belakang */
        }

        .ticket-section.visible {
            opacity: 1; /* Tampilkan elemen */
            animation: fadeIn 1s ease-in-out forwards; /* Terapkan animasi masuk */
        }

        .ticket-content {
            flex: 1;
            padding: 20px;
        }

        .ticket-title {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .ticket-highlight {
            color: #ff6347; /* Warna highlight */
        }

        .ticket-features {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }



        .ticket-feature-left .ticket-feature,
        .ticket-feature-right .ticket-feature {
            animation-delay: 0.2s; /* Delay untuk fitur kiri */
        }

        .ticket-feature-right .ticket-feature {
            animation-delay: 0.4s; /* Delay untuk fitur kanan */
        }

        .ticket-checkmark {
            margin-right: 10px;
            color: green;
            font-size: 1.5rem;
        }

        .ticket-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .ticket-img {
            max-width: 100%;
            height: auto;
            opacity: 0; /* Mulai dengan tidak terlihat */
            animation: fadeIn 1s ease-in-out forwards; /* Terapkan animasi gambar */
        }
    </style>
</head>
<body>

 <section class="ticket-section">
  <div class="ticket-content">
    <h2 class="ticket-title">
      Aplikasi Pembelian Tiket <br><span class="ticket-highlight">Terbaik !</span>
    </h2>
    <div class="ticket-features">
      <div class="ticket-feature-left">
        <div class="ticket-feature">
          <span class="ticket-checkmark">✔</span> <strong>Akses Eksklusif</strong>
          <p>Tiket presale dan early bird tersedia hanya untuk Anda.</p>
        </div>
        <div class="ticket-feature">
          <span class="ticket-checkmark">✔</span> <strong>Pilihan Lengkap</strong>
          <p>Dari tiket reguler hingga VIP, semuanya transparan tanpa biaya tersembunyi.</p>
        </div>
        <div class="ticket-feature">
          <span class="ticket-checkmark">✔</span> <strong>Aman dan Terpercaya</strong>
          <p>Semua tiket 100% resmi, dengan pembayaran terenkripsi.</p>
        </div>
      </div>
      <div class="ticket-feature-right">
        <div class="ticket-feature">
          <span class="ticket-checkmark">✔</span> <strong>Update Real-Time</strong>
          <p>Update jadwal konser secara langsung.</p>
        </div>
        <div class="ticket-feature">
          <span class="ticket-checkmark">✔</span> <strong>Mudah Digunakan</strong>
          <p>Pesan tiket dalam hitungan menit, kapan saja dan di mana saja.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="ticket-image">
    <img src="assets/komputer.png" alt="modern" class="ticket-img" />
  </div>
</section>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ticketSection = document.querySelector('.ticket-section');

        // Buat instance Intersection Observer untuk section
        const sectionObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    ticketSection.classList.add('visible'); // Tambahkan kelas saat terlihat
                } else {
                    ticketSection.classList.remove('visible'); // Hapus kelas saat tidak terlihat
                }
            });
        });

        // Mulai mengamati elemen section
        sectionObserver.observe(ticketSection);
    });
</script>

</div>



<body style="font-family: Arial, sans-serif; text-align: center; background-color: #fff; color: #333; font-size: 18px;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 30px;">
    <h2 style="color: rgb(0, 0, 0); font-size: 32px; margin-bottom: 5px;">Keuntungan Memilih <span style="color: blue; font-weight: bold;">Vibestix</span></h2>
        <p style="font-size: 20px; margin-bottom: 40px;">Kami menjanjikan pengguna dengan standar 4 layanan ini</p>
        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 30px;">
            <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                <img src="./assets/f1.png" alt="Banyak Pilihan Konser" style="width: 120px; height: 120px; object-fit: contain; margin-bottom: 15px;">
                <h3 style="font-size: 24px; color: rgb(0, 0, 0); margin-bottom: 10px;">Banyak Pilihan Konser</h3>
                <p style="font-size: 18px; color: #555;">Kamu bisa melihat dan memilih banyak pilihan konser yang menarik dari artis favoritmu</p>
            </div>
            <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                <img src="./assets/f2.png" alt="Online Booking" style="width: 120px; height: 120px; object-fit: contain; margin-bottom: 15px;">
                <h3 style="font-size: 24px; color: rgb(0, 0, 0); margin-bottom: 10px;">Online Booking!</h3>
                <p style="font-size: 18px; color: #555;">Kamu bisa membeli tiket konser dengan mudah hanya lewat aplikasi Vibestix</p>
            </div>
            <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                <img src="./assets/f3.png" alt="Jaminan Tiket" style="width: 120px; height: 120px; object-fit: contain; margin-bottom: 15px;">
                <h3 style="font-size: 24px; color: rgb(0, 0, 0); margin-bottom: 10px;">Jaminan Tiket</h3>
                <p style="font-size: 18px; color: #555;">Jaminan konser terpercaya oleh Vibestix untuk para pecinta musik</p>
            </div>
            <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                <img src="./assets/f4.png" alt="Tiket Termurah" style="width: 120px; height: 120px; object-fit: contain; margin-bottom: 15px;">
                <h3 style="font-size: 24px; color: rgb(0, 0, 0); margin-bottom: 10px;">Tiket Termurah!</h3>
                <p style="font-size: 18px; color: #555;">Nikmati konser termurah dengan performa yang hebat oleh artis favoritmu</p>
            </div>
        </div>
    </div>
</body>



    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="js/main.js"></script>
  </body>

</html>
        <!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layouts.footer')


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const offerContainer = document.querySelector('.offer__container');

        // Buat instance Intersection Observer
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Tambahkan kelas saat terlihat
                    offerContainer.classList.add('visible');
                } else {
                    // Hapus kelas saat tidak terlihat
                    offerContainer.classList.remove('visible');
                }
            });
        });

        // Mulai mengamati elemen
        observer.observe(offerContainer);
    });
     document.addEventListener("DOMContentLoaded", function() {
        const chooseContainer = document.querySelector('.choose__container');
        const chooseCards = document.querySelectorAll('.choose__card');

        // Buat instance Intersection Observer untuk container
        const containerObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    chooseContainer.classList.add('visible'); // Tambahkan kelas saat terlihat
                } else {
                    chooseContainer.classList.remove('visible'); // Hapus kelas saat tidak terlihat
                }
            });
        });

        // Mulai mengamati elemen container
        containerObserver.observe(chooseContainer);

        // Buat instance Intersection Observer untuk cards
        const cardObserver = new IntersectionObserver(entries => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible'); // Tambahkan kelas saat terlihat
                } else {
                    entry.target.classList.remove('visible'); // Hapus kelas saat tidak terlihat
                }
            });
        });

        // Mulai mengamati setiap card dengan delay
        chooseCards.forEach((card, index) => {
            cardObserver.observe(card);
            card.style.animationDelay = `${index * 0.1}s`; // Delay animasi berdasarkan urutan
        });
    });
</script>
