<script>
    import axios from "axios";
    export let selected;

    let isReady;

    const getData = () => {
        isReady = false;

        axios.get('/filter.php', {
           params: {
               selected
           }
        })
        .then((response) => {
            if (response.status === 200 && response.statusText === 'OK') {
                isReady = true;
                selectedPartners = response.data;
            }
        })
        .catch((error) => console.log(error))
    };

    $: selectedPartners = selected ? getData() : '';
</script>

{#if isReady && isReady === false}
    <div class="preloader">
        <p>Please wait...</p>
    </div>
{/if}

<div class="data">
    <div class="wrapper data__wrapper">
        {#if (selected && selectedPartners && !Array.isArray(selectedPartners))}
            <p class="data__not-found">{selectedPartners}</p>
        {/if}
        {#if (selected && selectedPartners && Array.isArray(selectedPartners) && selectedPartners.length)}
            {#each selectedPartners as partner (partner.id)}
                <section class="partner">
                    <img src="{partner.logo}" alt="{partner.company}">
                    <div class="partner__description">
                        <h2>{partner.company}</h2>
                        <address>{partner.address}</address>
                    </div>
                    <div class="partner__links">
                        <a href="{partner.website}" class="partner__website">Website</a>
                        <a href="tel:{partner.phone}" class="partner__phone">{partner.phone}</a>
                    </div>
                    <p class="partner__status">{partner.status}</p>
                </section>
            {/each}
        {/if}
    </div>
</div>

<style lang="scss">
  @import "../styles/style";

  .data {
    height: 100%;
    padding-top: 55px;
    background-color: var(--bg-light-gray);
  }

  .data__wrapper {
    max-width: 295px;
    padding: 0;
  }

  .partner {
    margin-bottom: 20px;
    padding: 45px 24px;
    background-color: var(--white);
    box-shadow: 0 1px 2px var(--shadow);

    img {
      width: 95px;
      height: auto;
      margin-bottom: 40px;
    }

    h2 {
      @include clear-content(15px);
      @include font(21px, 32px);
      font-weight: 700;
    }

    address {
      @include clear-content(30px);
      @include font(14px, 24px);
      position: relative;
      display: block;
      font-style: normal;

      &::before {
        position: absolute;
        left: 0;
        bottom: -20px;
        z-index: 1;
        width: 100%;
        height: 1px;
        background-color: var(--line-gray);
        content: "";
      }
    }

    a {
      display: block;
    }
  }

  .partner__website {
    @include clear-content(10px);
    @include font(14px, 32px);
    color: var(--blue);
    text-decoration: underline;
  }

  .partner__phone {
    @include clear-content(10px);
    @include font(13px, 32px);
    color: var(--base);
  }

  .partner__status {
    @include clear-content(5px);
    @include font(13px, 32px);
    font-weight: 600;
    color: var(--base);
  }

  .data__not-found {
    text-align: center;
  }

  @media (min-width: $desktop) {
    .data__wrapper {
      max-width: 1110px;
    }

    .partner {
      padding: 40px 80px;
      display: flex;
      align-items: center;

      img {
        margin: 0 80px 0 0;
      }

      address {
        margin-bottom: 0;

        &::before {
          content: none;
        }
      }
    }

    .partner__description {
      margin-right: auto;
    }

    .partner__links {
      position: relative;
      padding-right: 30px;

      &::before {
        position: absolute;
        right: 0;
        top: 0;
        z-index: 1;
        width: 1px;
        height: 100%;
        background-color: var(--line-gray);
        content: "";
      }
    }

    .partner__phone {
      margin-bottom: 0;
    }

    .partner__status {
      margin-bottom: 0;
      padding-left: 30px;
    }

    .data__not-found {
      @include clear-content(15px);
      @include font(21px, 32px);
    }
  }
</style>