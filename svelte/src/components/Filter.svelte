<script>
    export let types;
    export let countries;
    export let states;

    export let selected;
</script>

<section class="filter">
    <select name="type" id="type" bind:value={selected}>
        <option value="" disabled selected>Type</option>
        {#if types}
            {#each types as type}
                <option value="{type.status_name}">
                    {type.status_name}
                </option>
            {/each}
        {/if}
    </select>
    <select name="country" id="country">
        <option value="" disabled selected>Country</option>
        {#if countries}
            {#each countries as country}
                <option value="{country.name}">
                    {country.name}
                </option>
            {/each}
        {/if}
    </select>
    <select name="state" id="state">
        <option value="" disabled selected>State</option>
        {#if states}
            {#each states as state}
                <option value="{state.name}">
                    {state.name}
                </option>
            {/each}
        {/if}
    </select>
</section>

<style lang="scss">
  @import "../styles/style";

  .filter {
    select {
      @include font(13px, 40px);

      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      font-weight: 600;
      color: var(--white);
      border: 2px solid var(--white);
      border-radius: 5px;
      background: none;

      &:last-child {
        margin-bottom: 65px;
      }

      option {
        @include font(13px, 31px);
        color: var(--dark-gray);
      }
    }
  }

  @media (min-width: $desktop) {
    .filter {
      display: flex;
      align-items: flex-start;

      select:first-child {
        margin-right: 10px;
      }

      select:last-child {
        margin-bottom: 120px;
      }
    }
  }

</style>