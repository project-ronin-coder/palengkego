<style>
  :root {
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

  }

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

  #Admin-Office:hover {
    background-color: #3b3b3b;
    fill: #3b3b3b;
    cursor: pointer;
  }

  .map-section:hover {
    background-color: #3b3b3b;
    fill: #3b3b3b;
    cursor: pointer;
  }

  .route {
    display: none;
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
    fill: #FFF;
    animation: blink-animation 1.3s steps(15, start) infinite;
    -webkit-animation: blink-animation 1.3s steps(15, start) infinite;
  }

  #DryGoodsAnnexSection-Muslim {
    fill: var(--color-for-dry-goods-annex);
  }

  #DryGoodsAnnexSection-Muslim.fill {
    stroke: #000;
    stroke-width: 5;
    fill: #FFF;
    animation: blink-animation 1.3s steps(15, start) infinite;
    -webkit-animation: blink-animation 1.3s steps(15, start) infinite;
  }

  #GrocerySection {
    fill: var(--color-for-grocery);
  }

  #GrocerySection.fill {
    stroke: #000;
    stroke-width: 5;
    fill: #FFF;
    animation: blink-animation 1.3s steps(15, start) infinite;
    -webkit-animation: blink-animation 1.3s steps(15, start) infinite;
  }

  #GrocerySection-Extension {
    fill: var(--color-for-grocery-extension);
  }

  #GrocerySection-Extension.fill {
    stroke: #000;
    stroke-width: 5;
    fill: #FFF;
    animation: blink-animation 1.3s steps(15, start) infinite;
    -webkit-animation: blink-animation 1.3s steps(15, start) infinite;
  }

  #MeatSection {
    fill: var(--color-for-meat-section);
  }

  #MeatSection.fill {
    stroke: #000;
    stroke-width: 5;
    fill: #FFF;
    animation: blink-animation 1.3s steps(15, start) infinite;
    -webkit-animation: blink-animation 1.3s steps(15, start) infinite;
  }

  #FishSection {
    fill: var(--color-for-fish-section);
  }

  #FishSection.fill {
    stroke: #000;
    stroke-width: 5;
    fill: #FFF;
    animation: blink-animation 1.3s steps(15, start) infinite;
    -webkit-animation: blink-animation 1.3s steps(15, start) infinite;
  }

  #VegetableSection {
    fill: var(--color-for-vegetable-section);
  }

  #VegetableSection.fill {
    stroke: #000;
    stroke-width: 5;
    fill: #FFF;
    animation: blink-animation 1.3s steps(15, start) infinite;
    -webkit-animation: blink-animation 1.3s steps(15, start) infinite;
  }

  #FruitSection {
    fill: var(--color-for-fruit-section);
  }

  #FruitSection.fill {
    stroke: #000;
    stroke-width: 5;
    fill: #FFF;
    animation: blink-animation 1.3s steps(15, start) infinite;
    -webkit-animation: blink-animation 1.3s steps(15, start) infinite;
  }

  #FruitsAndVegetableSection-Extension {
    fill: var(--color-for-fruit-and-vegetable);
  }

  #FruitsAndVegetableSection-Extension.fill {
    stroke: #000;
    stroke-width: 5;
    fill: #FFF;
    animation: blink-animation 1.3s steps(15, start) infinite;
    -webkit-animation: blink-animation 1.3s steps(15, start) infinite;
  }

  #CarinderiaSection {
    fill: var(--color-for-carinderia-section);
  }

  #CarinderiaSection.fill {
    stroke: #000;
    stroke-width: 5;
    fill: #FFF;
    animation: blink-animation 1.3s steps(15, start) infinite;
    -webkit-animation: blink-animation 1.3s steps(15, start) infinite;
  }

  #ProcessedFoodsSection {
    fill: var(--color-for-processed-section);
  }

  #ProcessedFoodsSection.fill {
    stroke: #000;
    stroke-width: 5;
    fill: #FFF;
    animation: blink-animation 1.3s steps(15, start) infinite;
    -webkit-animation: blink-animation 1.3s steps(15, start) infinite;
  }

  #Admin-Office {
    fill: #25ab7b;
  }

  #Admin-Office.fill {
    stroke: #000;
    stroke-width: 5;
    fill: #FFF;
    animation: blink-animation 1.3s steps(15, start) infinite;
    -webkit-animation: blink-animation 1.3s steps(15, start) infinite;
  }

  @keyframes blink-animation {
    to {
      opacity: 0;
    }
  }

  @-webkit-keyframes blink-animation {
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

  .parking-area-1 {
    fill: #343a40;
  }

  .parking-area-2 {
    fill: #343a40;
  }

  #PalengkeGoMapContainer {
    fill: #D5EEE5;
    stroke: #2ED297;
    stroke-width: 10;
    filter: drop-shadow(5px 5px 25px #AABFB7);
  }

  .fill-assigned {
    stroke: #25ab7b;
    stroke-width: 5;
    fill: #000;
  }

  svg {
    width: 100%;
    height: 60vh;
  }

  @media (max-width: 468px) {
    svg {
      width: 100%;
      height: 40vh;
    }
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