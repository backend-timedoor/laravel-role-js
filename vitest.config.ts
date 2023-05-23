import { configDefaults, defineConfig } from 'vitest/config'

export default defineConfig({
  test: {
    include: ['tests/**/*.{test,spec}.{ts,js}'],
    exclude: [
      ...configDefaults.exclude,
      'stubs/*',
      'src/*',
      'config/*',
      'vendor/*',
    ],
  },
})
