<script>
    import Header from "./components/Header.svelte";
    import Hero from "./components/Hero.svelte";
    import Cards from "./components/Cards.svelte";

	export let partners;
	export let types;
	export let countries;
	export let states;

    let selected;
</script>

<Header/>

<main>
    <Hero {types} {countries} {states} bind:selected={selected} />
    <Cards {partners} bind:selected={selected} />
</main>

<style lang="scss">
  @import "styles/style";

  main {
    flex-grow: 1;
  }
</style>