<div>
  <line-chart :data="chartData"></line-chart>
</div>

<script>
import { Line } from "vue-chartjs";
export default {
  extends: Line,
  props: ["bookChart"],
  data() {
    return {
      labels: [],
      dataChart: [],
    };
  },
  watch: {
    bookChart(newValue) {
      // Xử lý giá trị myProp ở đây
      let self = this;
      console.log(newValue)
      newValue.forEach(function (item) {
        self.labels.push(item.category);
        self.dataChart.push(item.total);
      });
      this.renderChart(
        {
          labels: this.labels,
          datasets: [
            {
              label: "Books",
              data: this.dataChart,
            },
          ],
        },
        {
          responsive: true,
          maintainAspectRatio: false,
        }
      );
    },
  },
};
</script>
