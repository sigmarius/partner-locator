<script>
    import Icons from "./Icons.svelte";

    let innerWidth;

    $: condition = innerWidth > 768;
    $: placeholder = condition ? 'Search by company name or adress..' : 'Search';

</script>

<svelte:window bind:innerWidth />

<div class="search">
    <input id="search" name="search" type="text" class="form-input" placeholder="{placeholder}" />
    <button type="button">
        <Icons name="search" className="mr-2 md:mr-0" />
    </button>
</div>

<style lang="scss">
  @import "../styles/style";

  .search {
    position: relative;
    margin-bottom: 20px;

    input {
      width: 100%;
      height: 45px;
      padding: 10px;
      border: 1px solid var(--white);
      border-radius: 5px;

      &::placeholder {
        @include font(15px, 32px);
        color: var(--gray);
      }
    }

    button {
      position: absolute;
      top: 0;
      right: 0;
      width: 45px;
      height: 45px;
      background: none;
      border: none;
    }

  }
</style>