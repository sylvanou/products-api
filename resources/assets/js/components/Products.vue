<template>
  <div>
    <h2>Products Page</h2>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item" v-bind:class="[{disabled: !pagination.prev_page_url}]">
          <a class="page-link" href="#" @click="fetchProducts(pagination.prev_page_url)">Previous</a>
        </li>

        <li class="page-item disabled">
          <a
            href="#"
            class="page-link text-dark"
          >Page {{ pagination.current_page || 0 }} of {{ pagination.last_page || 0 }}</a>
        </li>

        <li class="page-item" v-bind:class="[{disabled: !pagination.next_page_url}]">
          <a class="page-link" href="#" @click="fetchProducts(pagination.next_page_url)">Next</a>
        </li>
      </ul>
    </nav>
    <div class="card card-body mb-2" v-for="product in products" v-bind:key="product.id">
      <h3>{{ product.name }}</h3>
      <h4>{{ product.brand}}</h4>
      <p>{{ product.size}}</p>
      <p>{{ product.color}}</p>
      <hr>
      <button @click="deleteProduct(product)" class="btn btn-danger">Delete</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Products",
  data() {
    return {
      products: [],
      product: {
        id: "",
        name: "",
        size: "",
        color: "",
        brand: ""
      },
      product_id: "",
      pagination: {},
      edit: false
    };
  },

  created() {
    this.fetchProducts();
  },

  methods: {
    fetchProducts(page_url) {
      let vm = this;
      page_url = page_url || "api/products";
      fetch(page_url)
        .then(res => res.json())
        .then(res => {
          console.log(res);
          this.products = res.data;
          vm.makePagination(res.meta, res.links);
        })
        .catch(err => console.log(err));
    },
    makePagination(meta, links) {
      console.log(meta, links);
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      };
      this.pagination = pagination;
      console.log("This is the pagination", this.pagination);
    },
    deleteProduct({ id, name, brand }) {
      if (confirm("Are You Sure?")) {
        fetch(`api/product/${id}`, {
          method: "delete"
        })
          .then(res => res.json())
          .then(data => {
            alert(`${name} by ${brand} Removed`);
            this.fetchProducts();
          })
          .catch(err => console.log(err));
      }
    }
  }
};
</script>

<style>
</style>
