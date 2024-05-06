const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: "server.php",
      toSee: [],
      lastID: null,
      done: '',

      newObj: {
        id: null,
        city: "",
        done: "",
      },
    };
  },
  methods: {
    getData() {
      axios.get(this.apiUrl).then((res) => {
        this.toSee = res.data;
        this.lastID = this.toSee.length ;
        //console.log(this.toSee);
      })
      .catch((err) => {
        console.log(err);
      });

    },
    addItem() {
      const ncity = { ...this.newObj };
      this.newObj = {
        
        city: "",
        done: "",
      };
      this.lastID += 1;
      ncity.id = this.lastID;

      console.log(ncity);
      console.log(this.toSee);

      const data = new FormData();
      data.append("id", ncity.id);
      data.append("city", ncity.city);
      data.append("done", ncity.done);
      console.log(data);

      axios
        .post(this.apiUrl, data)
        .then((res) => {
          console.log(res.data);
          this.toSee = res.data;
          this.lastID = this.toSee.length + 1;
        })
        .catch((err) => {
          console.log(err);
        });

      
    },
    ToggleToSee(id) {
      const item = this.toSee.find((el) => {
        return el.id === id;
      });

      if (item) {
        item.done = !item.done;
      }
      console.log(item);
    },
  },
  computed: {},
  created() {
    this.getData();
  },
}).mount("#app");
