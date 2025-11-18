import { useState } from 'react';
import Navbar from './navbar';
import GreetingBg from '../public/greeting_bg.jpg';

export default function App() {
  const [navbarHeight, setNavbarHeight] = useState(0);

  return (
    <>
      <Navbar onHeightChange={setNavbarHeight} />

      <div
        className="w-full bg-cover bg-center relative"
        style={{
          backgroundImage: `url(${GreetingBg})`,
          height: `calc(100vh - ${navbarHeight}px)`,
        }}
      >
        <div className="absolute inset-0 flex flex-col items-center justify-center text-white text-4xl font-bold text-center">
          <div>Cryptobit</div>
          <div>Analytics</div>
        </div>
      </div>
    </>
  );
}
