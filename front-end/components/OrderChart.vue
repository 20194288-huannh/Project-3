<div>
  <line-chart :data="chartData"></line-chart>
</div>

<script>
import { Line } from "vue-chartjs";

const month = {
  1: "Jan",
  2: "Feb",
  3: "Mar",
  4: "Apr",
  5: "May",
  6: "Jun",
  7: "Jul",
  8: "Aug",
  9: "Sep",
  10: "Oct",
  11: "Nov",
  12: "Dec",
};
export default {
  extends: Line,
  props: ["orderChart"],
  data() {
    return {
      labels: [],
      dataChart: [],
    };
  },
  watch: {
    orderChart(newValue) {
      // Xử lý giá trị myProp ở đây
      let self = this;
      newValue.forEach(function (item) {
        self.labels.push(month[item.month]);
        self.dataChart.push(item.total);
      });
      this.renderChart(
        {
          labels: this.labels,
          datasets: [
            {
              label: "Orders",
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
  beforeUpdate() {
    this.orderChart.forEach(function (item) {
      this.labels.push(month[item.month]);
      this.dataChart.push(item.total);
    });
    this.renderChart(
      {
        labels: this.labels,
        datasets: [
          {
            label: "Orders",
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
};
</script>
