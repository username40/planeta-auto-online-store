const jsonServer = require('json-server')
const clone = require('clone')
const data = require('./placeholder.json')

const app = jsonServer.create()
const router = jsonServer.router(clone(data), { _isFake: true })

app.use((req, res, next) => {
  if (req.path === '/') return next()
  router.db.setState(clone(data))
  next()
})

app.use(jsonServer.defaults({
  logger: process.env.NODE_ENV !== 'production'
}))

app.use(router)

const port = process.env.FAKE_PORT || 3000

app.listen(port, () => {
  console.log('JSONPlaceholder listening on http://localhost:' + port)
})
