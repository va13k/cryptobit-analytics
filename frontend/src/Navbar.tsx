import React from 'react';
import LogoImage from '../public/main_logo.svg';

export default function Navbar({
  onHeightChange,
}: Readonly<{ onHeightChange?: (height: number) => void }>) {
  const [isDropdownVisible, setIsDropdownVisible] = React.useState(false);
  const [language, setLanguage] = React.useState('EN');
  const navbarRef = React.useRef<HTMLDivElement>(null);

  React.useEffect(() => {
    const handleResize = () => {
      if (navbarRef.current && onHeightChange) {
        onHeightChange(navbarRef.current.offsetHeight);
      }
    };

    handleResize();

    window.addEventListener('resize', handleResize);
    return () => window.removeEventListener('resize', handleResize);
  });

  const toggleDropdown = () => {
    setIsDropdownVisible(!isDropdownVisible);
  };

  const handleLanguageChange = (lang: string) => {
    if (!lang) {
      setLanguage('EN');
    } else {
      setLanguage(lang);
    }
    setIsDropdownVisible(false);
  };

  const languageLabels = {
    EN: 'English',
    UA: 'Українська',
    IT: 'Italiano',
    DE: 'Deutsch',
  };

  return (
    <header className="sticky-top">
      <nav className="bg-zinc-900 border-b border-gray-800">
        <div className="container mx-auto px-4 py-3 flex items-center justify-between">
          <div className="flex items-center">
            <div className="bg-blue-600 w-10 h-10 rounded flex items-center justify-center mr-2">
              <img className="nav-brand" src={LogoImage} alt="main logo" />
            </div>
            <div>
              <div className="font-bold text-blue-600">Cryptobit</div>
              <div className="font-medium text-blue-600">Analytics</div>
            </div>
          </div>

          <div className="hidden md:flex space-x-12 lg:space-x-20">
            <a
              href="#about"
              className="text-gray-300 hover:text-white font-medium"
            >
              About us
            </a>
            <a
              href="#services"
              className="text-gray-300 hover:text-white font-medium"
            >
              Services
            </a>
            <a
              href="#articles"
              className="text-gray-300 hover:text-white font-medium"
            >
              Reviews
            </a>
            <a
              href="#contacts"
              className="text-gray-300 hover:text-white font-medium"
            >
              Contacts
            </a>
          </div>

          <div className="relative">
            <button
              className="flex items-center justify-between px-3 py-1.5 w-[130px] text-sm border border-blue-700 rounded bg-zinc-900 text-white hover:bg-blue-700"
              onClick={toggleDropdown}
            >
              <span className="font-medium truncate">
                {languageLabels[language as keyof typeof languageLabels]}
              </span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                className="h-4 w-4 text-blue-500 ml-2 shrink-0"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth="2"
                  d="M19 9l-7 7-7-7"
                />
              </svg>
            </button>

            {isDropdownVisible && (
              <div className="absolute right-0 mt-1 w-[8em] bg-black border border-blue-800 rounded shadow-lg z-50">
                <div className="py-1 flex flex-col max-h-60 overflow-y-auto">
                  {Object.entries(languageLabels).map(([code, label]) => (
                    <button
                      key={code}
                      className="w-full text-left text-white px-3 py-2 hover:bg-blue-900/30"
                      onClick={() => handleLanguageChange(code)}
                    >
                      {label}
                    </button>
                  ))}
                </div>
              </div>
            )}
          </div>
        </div>
      </nav>
    </header>
  );
}
