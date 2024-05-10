const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: "server.php",
      toSee: [],
      lastID: null,
      done: "",

      newObj: {
        id: null,
        city: "",
        done: "",
      },
    };
  },
  methods: {
    getData() {
      axios
        .get(this.apiUrl)
        .then((res) => {
          this.toSee = res.data;
          this.lastID = this.toSee[this.toSee.length - 1].id;
          console.log(this.toSee);
          console.log(this.lastID);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    addItem() {
      if (this.newObj.city !== "") {
        const ncity = { ...this.newObj };
        this.newObj = {
          city: "",
          done: "",
        };
        this.lastID += 1;
        ncity.id = this.lastID;

        //console.log(ncity);
        //console.log(this.toSee);

        const data = new FormData();
        //data.append("id", ncity.id);
        //data.append("city", ncity.city);
        //data.append("done", ncity.done);
        for (let key in ncity) {
          data.append(key, ncity[key]);
        }
        console.log(data);

        axios
          .post(this.apiUrl, data)
          .then((res) => {
            console.log(res.data);
            this.toSee = res.data;
          })
          .catch((err) => {
            console.log(err);
          });
      }
    },
    // ToggleToSee(id) {
    //   const item = this.toSee.find((el) => el.id === id);
    //   if (item) {
    //      item.done = !item.done;
    //   }

    //   axios.put(this.apiUrl, { id: item.id, done: item.done }).then((res) => {
    //     console.log(res.data);
    //     this.toSee = res.data;
    //   });
    //   console.log(item);
    // },
    deleteItem(index) {
      const data = {
        id: index,
      };

      axios.delete(this.apiUrl, { data }).then((res) => {
        this.toSee = res.data;
        console.log(this.lastID);
        console.log(res.data);
      });
    },
  },
  computed: {},
  created() {
    this.getData();
  },
}).mount("#app");
