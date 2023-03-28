export default function (context) {
    if (context?.store?.state?.auth?.user?.role !== 1) {
        context.redirect('/')
    }
  }
  