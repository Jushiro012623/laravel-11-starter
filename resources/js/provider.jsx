import { HeroUIProvider } from '@heroui/react'
import React from 'react'

const Provider = ({children}) => {
  return (
    <React.Fragment>
        <HeroUIProvider>
            {children}
        </HeroUIProvider>
    </React.Fragment>
  )
}

export default Provider