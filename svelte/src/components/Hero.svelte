<script>
    import Filter from "./Filter.svelte";
    import Search from "./Search.svelte";

    export let types;
    export let countries;
    export let states;
    export let selected;
</script>

<section class="hero">
    <div class="wrapper hero__wrapper">
        <div class="hero__text">
            <h1>Netwrix Partner Locator</h1>
            <p>Hundreds of Netwrix partners around the world are standing by to help you. With our Partner Locator you can easily find the list of authorized partners in your area.</p>
        </div>

        <Search />

        <Filter {types} {countries} {states} bind:selected={selected}/>
    </div>
</section>

<style lang="scss">
  @import "../styles/style";

  .hero {
    padding-top: 50px;
    background-color: var(--bg-blue);
    background-image: url("/svelte/src/img/hero-bg-mobile@1x.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    color: var(--white);

    @media (min-resolution: $retina-dpi), (min-resolution: $retina-dppx) {
      background-image: url("/svelte/src/img/hero-bg-mobile@2x.jpg");
    }
  }

  .hero__wrapper {
    max-width: 295px;
    padding: 0;
  }

  .hero__text {
    text-align: center;

    h1 {
      @include clear-content(30px);
      @include font(30px, 40px);
      font-weight: 700;
    }

    p {
      @include clear-content(40px);
      @include font(14px, 28px);
    }
  }

  @media (min-width: $desktop) {
    .hero {
      padding-top: 120px;
      background-image: url("/svelte/src/img/hero-bg-desktop@1x.jpg");
      background-repeat: no-repeat;

      @media (min-resolution: $retina-dpi), (min-resolution: $retina-dppx) {
        background-image: url("/svelte/src/img/hero-bg-desktop@2x.jpg");
      }
    }

    .hero__wrapper {
      max-width: 700px;
    }

    .hero__text {
      h1 {
        @include clear-content(20px);
        @include font(46px, 28px);
      }

      p {
        @include clear-content(50px);
        @include font(16px, 32px);
      }
    }
  }

</style>