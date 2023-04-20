<style>
  :root {
    /* #region Section Color Variables */

    /* Dry Goods */
    --color-for-dry-goods: #ffca3a;
    --color-for-dry-goods-annex: #277da1;
    /* Grocery */
    --color-for-grocery: #ff99cc;
    --color-for-grocery-extension: #6a4c93;
    /* Meat and Fish */
    --color-for-meat-section: #ff924c;
    --color-for-fish-section: #ff595e;
    /* Fruits and Vegetable */
    --color-for-fruit-section: #ffff99;
    --color-for-vegetable-section: #ccffcc;
    --color-for-fruit-and-vegetable: #43aa8b;
    /* Carinderia and Processed */
    --color-for-carinderia-section: #ccffff;
    --color-for-processed-section: #c5ca30;

    /* #endregion */
  }

  /* #region Prerequisites */
  *,
  :after,
  :before {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  html {
    display: block;
  }

  .btn-main {
    background-color: #59bd99;
  }

  .btn-main:hover {
    background-color: #fff;
  }

  /* #endregion */

  /* #region MAP STYLES */

  /* g {

  } */

  #GrocerySection-Extension,
  #CarinderiaSection,
  #ProcessedFoodsSection,
  #VegetableSection,
  #FruitSection,
  #FruitsAndVegetableSection-Extension,
  #MeatSection,
  #FishSection,
  #GrocerySection,
  #DryGoodsAnnexSection-Muslim,
  #DryGoods,
  #Admin-Office {
    stroke: #343a40;
    stroke-width: 3;
  }

  .map-section:hover {
    background-color: #3b3b3b;
    fill: #3b3b3b;
    cursor: pointer;
  }

  #Admin-Office:hover {
    background-color: #3b3b3b;
    fill: #3b3b3b;
    cursor: pointer;
  }

  /* Adding stroke to sections */
  /* .dry-goods {
      stroke: white;
    } */

  svg {
    width: 100%;
    height: 100vh;
  }

  .map {
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 0;
    background-color: #E0F2EC;
  }

  /* #region SECTION COLORS */

  #PalengkeGoMapContainer {
    fill: red;
  }

  #DryGoods {
    fill: var(--color-for-dry-goods);
  }


  #DryGoods.fill {
    stroke: #000;
    stroke-width: 5;
    fill: #25ab7b;
    animation: fade-animation 1.3s steps(15, start) infinite;
    -webkit-animation: fade-animation 1.3s steps(15, start) infinite;
  }

  #DryGoodsAnnexSection-Muslim {
    fill: var(--color-for-dry-goods-annex);
  }

  #DryGoodsAnnexSection-Muslim.fill {
    stroke: #25ab7b;
    stroke-width: 5;
    fill: #FFF;
    animation: fade-animation 1.3s steps(15, start) infinite;
    -webkit-animation: fade-animation 1.3s steps(15, start) infinite;
  }

  #GrocerySection {
    fill: var(--color-for-grocery);
  }

  #GrocerySection.fill {
    stroke: #25ab7b;
    stroke-width: 5;
    fill: #FFF;
    animation: fade-animation 1.3s steps(15, start) infinite;
    -webkit-animation: fade-animation 1.3s steps(15, start) infinite;
  }

  #GrocerySection-Extension {
    fill: var(--color-for-grocery-extension);
  }

  #GrocerySection-Extension.fill {
    stroke: #25ab7b;
    stroke-width: 5;
    fill: #FFF;
    animation: fade-animation 1.3s steps(15, start) infinite;
    -webkit-animation: fade-animation 1.3s steps(15, start) infinite;
  }

  #MeatSection {
    fill: var(--color-for-meat-section);
  }

  #MeatSection.fill {
    stroke: #25ab7b;
    stroke-width: 5;
    fill: #FFF;
    animation: fade-animation 1.3s steps(15, start) infinite;
    -webkit-animation: fade-animation 1.3s steps(15, start) infinite;
  }

  #FishSection {
    fill: var(--color-for-fish-section);
  }

  #FishSection.fill {
    stroke: #25ab7b;
    stroke-width: 5;
    fill: #FFF;
    animation: fade-animation 1.3s steps(15, start) infinite;
    -webkit-animation: fade-animation 1.3s steps(15, start) infinite;
  }

  #VegetableSection {
    fill: var(--color-for-vegetable-section);
  }

  #VegetableSection.fill {
    stroke: #25ab7b;
    stroke-width: 5;
    fill: #FFF;
    animation: fade-animation 1.3s steps(15, start) infinite;
    -webkit-animation: fade-animation 1.3s steps(15, start) infinite;
  }

  #FruitSection {
    fill: var(--color-for-fruit-section);
  }

  #FruitSection.fill {
    stroke: #25ab7b;
    stroke-width: 5;
    fill: #FFF;
    animation: fade-animation 1.3s steps(15, start) infinite;
    -webkit-animation: fade-animation 1.3s steps(15, start) infinite;
  }

  #FruitsAndVegetableSection-Extension {
    fill: var(--color-for-fruit-and-vegetable);
  }

  #FruitsAndVegetableSection-Extension.fill {
    stroke: #25ab7b;
    stroke-width: 5;
    fill: #FFF;
    animation: fade-animation 1.3s steps(15, start) infinite;
    -webkit-animation: fade-animation 1.3s steps(15, start) infinite;
  }

  #CarinderiaSection {
    fill: var(--color-for-carinderia-section);
  }

  #CarinderiaSection.fill {
    stroke: #25ab7b;
    stroke-width: 5;
    fill: #000;
    animation: fade-animation 1.3s steps(15, start) infinite;
    -webkit-animation: fade-animation 1.3s steps(15, start) infinite;
  }

  #ProcessedFoodsSection {
    fill: var(--color-for-processed-section);
  }

  #ProcessedFoodsSection.fill {
    stroke: #000;
    stroke-width: 5;
    fill: #25ab7b;
    animation: fade-animation 1.3s steps(15, start) infinite;
    -webkit-animation: fade-animation 1.3s steps(15, start) infinite;
  }

  #Admin-Office {
    fill: #25ab7b;
  }

  #Admin-Office.fill {
    stroke: #000;
    stroke-width: 5;
    fill: #FFF;
    animation: fade-animation 1.3s steps(15, start) infinite;
    -webkit-animation: fade-animation 1.3s steps(15, start) infinite;
  }

  @keyframes fade-animation {
    to {
      opacity: 0;
    }
  }

  @-webkit-keyframes fade-animation {
    to {
      opacity: 0;
    }
  }

  #PARKING_AREA {
    fill: white;
    font-size: 36px;
    font-family: ProductSans-Bold, Product Sans;
    font-weight: 700;
  }


  #PalengkeGoMapContainer {
    fill: #D5EEE5;
    stroke: #2ED297;
    stroke-width: 10;
    filter: drop-shadow(5px 5px 25px #AABFB7);
  }


  .parking-area-1 {
    fill: #343a40;
  }

  .parking-area-2 {
    fill: #343a40;
  }

  /* 
  ------------------------------------------------
  ACTION BUTTONS
  ------------------------------------------------ 
  */
  .action-buttons {
    z-index: 0;
    position: absolute;
    right: 0;
    top: 0;
    padding: 5px;
  }

  .user-icon-container {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    background-color: #59bd99;
    margin-bottom: 10px;
    cursor: pointer;
  }

  .user-icon {
    width: 100%;
    height: 100%;
    -o-object-fit: cover;
    object-fit: cover;
  }

  /* 
  ------------------------------------------------
  SEARCH BUTTONS
  ------------------------------------------------ 
  */

  .search-buttons {
    z-index: 0;
    position: absolute;
    left: 0;
    top: 0;
    padding: 5px;
  }

  #inputSearch {
    border-radius: 0 !important;
  }

  .input-search {
    width: 500px;
  }

  /* 
  ------------------------------------------------
  CONTROL BUTTONS
  ------------------------------------------------ 
  */
  .controls {
    display: flex;
    flex-direction: column;
    position: fixed;
    bottom: 0;
    right: 0;
    padding: 10px;
  }

  .controls>.btn {
    margin-bottom: 10px;
    background-color: #59bd99;
    color: white;
    border-radius: 50%;
    width: 50px;
    height: 50px;
  }

  .controls>.btn:hover {
    background-color: #acdecc;
    color: black;
    border: 2px #59bd99 solid;
  }

  .btn:last-child {
    margin-bottom: 0;
  }

  /* 
  ------------------------------------------------
  NAVBAR OFFCANVAS
  ------------------------------------------------ 
  */

  #palengkegoLogo {
    height: 50px;
  }

  #navbarOffcanvas {
    width: 250px !important;
  }

  #navbarBody {
    display: flex;
    flex-direction: column;
  }

  #btnAccount {
    display: none;
  }

  .btn-navbar {
    height: 50px;
    width: 100%;
    display: flex;
    justify-content: flex-start;
    align-items: center;
  }

  .btn-navbar:hover {
    background-color: #343a40;
    color: white;
  }

  @media (max-width: 468px) {

    #navbarOffcanvas {
      height: 100% !important;
      width: 80% !important;
    }

    .btn-group {
      width: 100%;
    }

    .action-buttons>* {
      display: none;
    }

    .input-search {
      width: 100%;
    }

    .search-buttons {
      width: 100%;
    }

    <?php
    if (isset($_SESSION['user']) || isset($_SESSION['stallholder'])) {
      echo '
    #btnAccount {
      display: flex;
    }
          ';
    }
    ?>
  }


  @media (max-width: 768px) {

    #directionsOffcanvas,
    #filterOffcanvas,
    #stallsOffcanvas,
    #accountOffcanvas,
    #AboutOffcanvas,
    #GuideOffcanvas,
    #stallOwnedOffcanvas,
    #stallNoRecordOffcanvas {
      height: 85vh !important;
      width: 100% !important;
    }

  }

  .bg-main {
    background-color: #59bd99 !important;
  }

  .cls-1 {
    fill: none;
    stroke: #67e8bd;
  }

  .route:hover {
    fill: #59bd99;
    cursor: pointer;
  }

  .view-product {
    cursor: pointer;
  }

  .view-product:hover {
    background-color: #59BD99;
  }

  .fill-assigned {
    stroke: #25ab7b;
    stroke-width: 5;
    fill: #000;
    animation: blink-animation 0.5s steps(5, start) infinite;
    -webkit-animation: blink-animation 0.5s steps(5, start) infinite;
  }

  @keyframes blink-animation {
    to {
      visibility: hidden;
    }
  }

  @-webkit-keyframes blink-animation {
    to {
      visibility: hidden;
    }
  }

  .stall-route {
    stroke-dasharray: 50;
    stroke-dashoffset: 1000;
    animation: dash 5s linear forwards infinite;
  }

  @keyframes dash {
    to {
      stroke-dashoffset: 0;
    }
  }

  .user-image {
    width: 40%;
    border: 1px solid #59bd99;
  }

  .dropdown-menu {
    width: 250px !important;
  }

  .dropdown-item:hover {
    background-color: #59bd99 !important;
  }

  .user-account {
    cursor: pointer;
  }

  .badge-dgs {
    background-color: var(--color-for-dry-goods) !important;
  }

  .badge-dgas {
    background-color: var(--color-for-dry-goods-annex) !important;
  }

  .badge-gs {
    background-color: var(--color-for-grocery) !important;
  }

  .badge-gse {
    background-color: var(--color-for-grocery-extension) !important;
  }

  .badge-fs {
    background-color: var(--color-for-fish-section) !important;
  }

  .badge-ms {
    background-color: var(--color-for-meat-section) !important;
  }

  .badge-frts {
    background-color: var(--color-for-fruit-section) !important;
  }

  .badge-vgts {
    background-color: var(--color-for-vegetable-section) !important;
  }

  .badge-fve {
    background-color: var(--color-for-fruit-and-vegetable) !important;
  }

  .badge-pfs {
    background-color: var(--color-for-processed-section) !important;
  }

  .badge-cs {
    background-color: var(--color-for-carinderia-section) !important;
  }

  .badge-admin {
    background-color: #25AB7B !important;
  }

  .badge-occupied {
    background-color: #000 !important;
  }

  #btnOccupied {
    pointer-events: none;
  }
</style>