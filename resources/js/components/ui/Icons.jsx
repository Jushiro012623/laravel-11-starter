import * as React from "react";


export const Logo = ({
  size = 36,
  height,
  ...props
}) => (
  <svg
    fill="none"
    height={size || height}
    viewBox="0 0 32 32"
    width={size || height}
    {...props}>
    <path
      clipRule="evenodd"
      d="M17.6482 10.1305L15.8785 7.02583L7.02979 22.5499H10.5278L17.6482 10.1305ZM19.8798 14.0457L18.11 17.1983L19.394 19.4511H16.8453L15.1056 22.5499H24.7272L19.8798 14.0457Z"
      fill="currentColor"
      fillRule="evenodd"
    />
  </svg>
);

export const DiscordIcon = ({
  size = 24,
  width,
  height,
  ...props
}) => {
  return (
    <svg
      height={size || height}
      viewBox="0 0 24 24"
      width={size || width}
      {...props}>
      <path
        d="M14.82 4.26a10.14 10.14 0 0 0-.53 1.1 14.66 14.66 0 0 0-4.58 0 10.14 10.14 0 0 0-.53-1.1 16 16 0 0 0-4.13 1.3 17.33 17.33 0 0 0-3 11.59 16.6 16.6 0 0 0 5.07 2.59A12.89 12.89 0 0 0 8.23 18a9.65 9.65 0 0 1-1.71-.83 3.39 3.39 0 0 0 .42-.33 11.66 11.66 0 0 0 10.12 0q.21.18.42.33a10.84 10.84 0 0 1-1.71.84 12.41 12.41 0 0 0 1.08 1.78 16.44 16.44 0 0 0 5.06-2.59 17.22 17.22 0 0 0-3-11.59 16.09 16.09 0 0 0-4.09-1.35zM8.68 14.81a1.94 1.94 0 0 1-1.8-2 1.93 1.93 0 0 1 1.8-2 1.93 1.93 0 0 1 1.8 2 1.93 1.93 0 0 1-1.8 2zm6.64 0a1.94 1.94 0 0 1-1.8-2 1.93 1.93 0 0 1 1.8-2 1.92 1.92 0 0 1 1.8 2 1.92 1.92 0 0 1-1.8 2z"
        fill="currentColor"
      />
    </svg>
  );
};
export const FacebookIcon = ({
  size = 24,
  width,
  height,
  ...props
}) => {
  return (
    <svg
      fill="none"
      height={size || height}
      viewBox="0 0 24 24"
      width={size || width}
      xmlns="http://www.w3.org/2000/svg"
      {...props}>
      <g id="SVGRepo_bgCarrier" strokeWidth="0" />
      <g
        id="SVGRepo_tracerCarrier"
        strokeLinecap="round"
        strokeLinejoin="round"
      />
      <g id="SVGRepo_iconCarrier">
        <path
          d="M22 12C22 6.47714 17.5229 1.99999 12 1.99999C6.47715 1.99999 2 6.47714 2 12C2 16.9913 5.65686 21.1283 10.4375 21.8785V14.8906H7.89844V12H10.4375V9.79687C10.4375 7.29062 11.9304 5.90624 14.2146 5.90624C15.3087 5.90624 16.4531 6.10155 16.4531 6.10155V8.56249H15.1921C13.9499 8.56249 13.5625 9.33333 13.5625 10.1242V12H16.3359L15.8926 14.8906H13.5625V21.8785C18.3431 21.1283 22 16.9913 22 12Z"
          fill="currentColor"
        />{" "}
      </g>
    </svg>
  );
};
export const TwitterIcon = ({
  size = 24,
  width,
  height,
  ...props
}) => {
  return (
    <svg
      height={size || height}
      viewBox="0 0 24 24"
      width={size || width}
      {...props}>
      <path
        d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z"
        fill="currentColor"
      />
    </svg>
  );
};

export const GithubIcon = ({
  size = 24,
  width,
  height,
  ...props
}) => {
  return (
    <svg
      height={size || height}
      viewBox="0 0 24 24"
      width={size || width}
      {...props}>
      <path
        clipRule="evenodd"
        d="M12.026 2c-5.509 0-9.974 4.465-9.974 9.974 0 4.406 2.857 8.145 6.821 9.465.499.09.679-.217.679-.481 0-.237-.008-.865-.011-1.696-2.775.602-3.361-1.338-3.361-1.338-.452-1.152-1.107-1.459-1.107-1.459-.905-.619.069-.605.069-.605 1.002.07 1.527 1.028 1.527 1.028.89 1.524 2.336 1.084 2.902.829.091-.645.351-1.085.635-1.334-2.214-.251-4.542-1.107-4.542-4.93 0-1.087.389-1.979 1.024-2.675-.101-.253-.446-1.268.099-2.64 0 0 .837-.269 2.742 1.021a9.582 9.582 0 0 1 2.496-.336 9.554 9.554 0 0 1 2.496.336c1.906-1.291 2.742-1.021 2.742-1.021.545 1.372.203 2.387.099 2.64.64.696 1.024 1.587 1.024 2.675 0 3.833-2.33 4.675-4.552 4.922.355.308.675.916.675 1.846 0 1.334-.012 2.41-.012 2.737 0 .267.178.577.687.479C19.146 20.115 22 16.379 22 11.974 22 6.465 17.535 2 12.026 2z"
        fill="currentColor"
        fillRule="evenodd"
      />
    </svg>
  );
};

export const MoonFilledIcon = ({
  size = 24,
  width,
  height,
  ...props
}) => (
  <svg
    aria-hidden="true"
    focusable="false"
    height={size || height}
    role="presentation"
    viewBox="0 0 24 24"
    width={size || width}
    {...props}>
    <path
      d="M21.53 15.93c-.16-.27-.61-.69-1.73-.49a8.46 8.46 0 01-1.88.13 8.409 8.409 0 01-5.91-2.82 8.068 8.068 0 01-1.44-8.66c.44-1.01.13-1.54-.09-1.76s-.77-.55-1.83-.11a10.318 10.318 0 00-6.32 10.21 10.475 10.475 0 007.04 8.99 10 10 0 002.89.55c.16.01.32.02.48.02a10.5 10.5 0 008.47-4.27c.67-.93.49-1.519.32-1.79z"
      fill="currentColor"
    />
  </svg>
);
export const SunFilledIcon = ({
  size = 24,
  width,
  height,
  ...props
}) => (
  <svg
    aria-hidden="true"
    focusable="false"
    height={size || height}
    role="presentation"
    viewBox="0 0 24 24"
    width={size || width}
    {...props}>
    <g fill="currentColor">
      <path d="M19 12a7 7 0 11-7-7 7 7 0 017 7z" />
      <path d="M12 22.96a.969.969 0 01-1-.96v-.08a1 1 0 012 0 1.038 1.038 0 01-1 1.04zm7.14-2.82a1.024 1.024 0 01-.71-.29l-.13-.13a1 1 0 011.41-1.41l.13.13a1 1 0 010 1.41.984.984 0 01-.7.29zm-14.28 0a1.024 1.024 0 01-.71-.29 1 1 0 010-1.41l.13-.13a1 1 0 011.41 1.41l-.13.13a1 1 0 01-.7.29zM22 13h-.08a1 1 0 010-2 1.038 1.038 0 011.04 1 .969.969 0 01-.96 1zM2.08 13H2a1 1 0 010-2 1.038 1.038 0 011.04 1 .969.969 0 01-.96 1zm16.93-7.01a1.024 1.024 0 01-.71-.29 1 1 0 010-1.41l.13-.13a1 1 0 011.41 1.41l-.13.13a.984.984 0 01-.7.29zm-14.02 0a1.024 1.024 0 01-.71-.29l-.13-.14a1 1 0 011.41-1.41l.13.13a1 1 0 010 1.41.97.97 0 01-.7.3zM12 3.04a.969.969 0 01-1-.96V2a1 1 0 012 0 1.038 1.038 0 01-1 1.04z" />
    </g>
  </svg>
);

export const HeartFilledIcon = ({
  size = 24,
  width,
  height,
  ...props
}) => (
  <svg
    aria-hidden="true"
    focusable="false"
    height={size || height}
    role="presentation"
    viewBox="0 0 24 24"
    width={size || width}
    {...props}>
    <path
      d="M12.62 20.81c-.34.12-.9.12-1.24 0C8.48 19.82 2 15.69 2 8.69 2 5.6 4.49 3.1 7.56 3.1c1.82 0 3.43.88 4.44 2.24a5.53 5.53 0 0 1 4.44-2.24C19.51 3.1 22 5.6 22 8.69c0 7-6.48 11.13-9.38 12.12Z"
      fill="currentColor"
      strokeLinecap="round"
      strokeLinejoin="round"
      strokeWidth={1.5}
    />
  </svg>
);

export const SearchIcon = (props) => (
  <svg
    aria-hidden="true"
    fill="none"
    focusable="false"
    height="1em"
    role="presentation"
    viewBox="0 0 24 24"
    width="1em"
    {...props}>
    <path
      d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"
      stroke="currentColor"
      strokeLinecap="round"
      strokeLinejoin="round"
      strokeWidth="2"
    />
    <path
      d="M22 22L20 20"
      stroke="currentColor"
      strokeLinecap="round"
      strokeLinejoin="round"
      strokeWidth="2"
    />
  </svg>
);

export const ChevronDownIcon = ({
  strokeWidth = 1.5,
  ...otherProps
}) => {
  return (
    <svg
      aria-hidden="true"
      fill="none"
      focusable="false"
      height="1em"
      role="presentation"
      viewBox="0 0 24 24"
      width="1em"
      {...otherProps}>
      <path
        d="m19.92 8.95-6.52 6.52c-.77.77-2.03.77-2.8 0L4.08 8.95"
        stroke="currentColor"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeMiterlimit={10}
        strokeWidth={strokeWidth}
      />
    </svg>
  );
};
export const EyeIcon = (props) => {
  return (
    <svg
      aria-hidden="true"
      fill="none"
      focusable="false"
      height="1em"
      role="presentation"
      viewBox="0 0 20 20"
      width="1em"
      {...props}>
      <path
        d="M12.9833 10C12.9833 11.65 11.65 12.9833 10 12.9833C8.35 12.9833 7.01666 11.65 7.01666 10C7.01666 8.35 8.35 7.01666 10 7.01666C11.65 7.01666 12.9833 8.35 12.9833 10Z"
        stroke="currentColor"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={1.5}
      />
      <path
        d="M9.99999 16.8916C12.9417 16.8916 15.6833 15.1583 17.5917 12.1583C18.3417 10.9833 18.3417 9.00831 17.5917 7.83331C15.6833 4.83331 12.9417 3.09998 9.99999 3.09998C7.05833 3.09998 4.31666 4.83331 2.40833 7.83331C1.65833 9.00831 1.65833 10.9833 2.40833 12.1583C4.31666 15.1583 7.05833 16.8916 9.99999 16.8916Z"
        stroke="currentColor"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={1.5}
      />
    </svg>
  );
};

export const DeleteIcon = (props) => {
  return (
    <svg
      aria-hidden="true"
      fill="none"
      focusable="false"
      height="1em"
      role="presentation"
      viewBox="0 0 20 20"
      width="1em"
      {...props}>
      <path
        d="M17.5 4.98332C14.725 4.70832 11.9333 4.56665 9.15 4.56665C7.5 4.56665 5.85 4.64998 4.2 4.81665L2.5 4.98332"
        stroke="currentColor"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={1.5}
      />
      <path
        d="M7.08331 4.14169L7.26665 3.05002C7.39998 2.25835 7.49998 1.66669 8.90831 1.66669H11.0916C12.5 1.66669 12.6083 2.29169 12.7333 3.05835L12.9166 4.14169"
        stroke="currentColor"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={1.5}
      />
      <path
        d="M15.7084 7.61664L15.1667 16.0083C15.075 17.3166 15 18.3333 12.675 18.3333H7.32502C5.00002 18.3333 4.92502 17.3166 4.83335 16.0083L4.29169 7.61664"
        stroke="currentColor"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={1.5}
      />
      <path
        d="M8.60834 13.75H11.3833"
        stroke="currentColor"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={1.5}
      />
      <path
        d="M7.91669 10.4167H12.0834"
        stroke="currentColor"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={1.5}
      />
    </svg>
  );
};

export const EditIcon = (props) => {
  return (
    <svg
      aria-hidden="true"
      fill="none"
      focusable="false"
      height="1em"
      role="presentation"
      viewBox="0 0 20 20"
      width="1em"
      {...props}>
      <path
        d="M11.05 3.00002L4.20835 10.2417C3.95002 10.5167 3.70002 11.0584 3.65002 11.4334L3.34169 14.1334C3.23335 15.1084 3.93335 15.775 4.90002 15.6084L7.58335 15.15C7.95835 15.0834 8.48335 14.8084 8.74168 14.525L15.5834 7.28335C16.7667 6.03335 17.3 4.60835 15.4583 2.86668C13.625 1.14168 12.2334 1.75002 11.05 3.00002Z"
        stroke="currentColor"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeMiterlimit={10}
        strokeWidth={1.5}
      />
      <path
        d="M9.90833 4.20831C10.2667 6.50831 12.1333 8.26665 14.45 8.49998"
        stroke="currentColor"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeMiterlimit={10}
        strokeWidth={1.5}
      />
      <path
        d="M2.5 18.3333H17.5"
        stroke="currentColor"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeMiterlimit={10}
        strokeWidth={1.5}
      />
    </svg>
  );
};


export const AcmeLogo = () => {
  return (
    <svg fill="none" height="36" viewBox="0 0 32 32" width="36">
      <path
        clipRule="evenodd"
        d="M17.6482 10.1305L15.8785 7.02583L7.02979 22.5499H10.5278L17.6482 10.1305ZM19.8798 14.0457L18.11 17.1983L19.394 19.4511H16.8453L15.1056 22.5499H24.7272L19.8798 14.0457Z"
        fill="currentColor"
        fillRule="evenodd"
      />
    </svg>
  );
};

export const ChevronDown = ({fill, size, height, width, ...props}) => {
  return (
    <svg
      fill="none"
      height={size || height || 24}
      viewBox="0 0 24 24"
      width={size || width || 24}
      xmlns="http://www.w3.org/2000/svg"
      {...props}
    >
      <path
        d="m19.92 8.95-6.52 6.52c-.77.77-2.03.77-2.8 0L4.08 8.95"
        stroke={fill}
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeMiterlimit={10}
        strokeWidth={1.5}
      />
    </svg>
  );
};

export const Lock = ({fill, size, height, width, ...props}) => {
  const color = fill;

  return (
    <svg
      height={size || height || 24}
      viewBox="0 0 24 24"
      width={size || width || 24}
      xmlns="http://www.w3.org/2000/svg"
      {...props}
    >
      <g transform="translate(3.5 2)">
        <path
          d="M9.121,6.653V4.5A4.561,4.561,0,0,0,0,4.484V6.653"
          fill="none"
          stroke={color}
          strokeLinecap="round"
          strokeLinejoin="round"
          strokeMiterlimit="10"
          strokeWidth={1.5}
          transform="translate(3.85 0.75)"
        />
        <path
          d="M.5,0V2.221"
          fill="none"
          stroke={color}
          strokeLinecap="round"
          strokeLinejoin="round"
          strokeMiterlimit="10"
          strokeWidth={1.5}
          transform="translate(7.91 12.156)"
        />
        <path
          d="M7.66,0C1.915,0,0,1.568,0,6.271s1.915,6.272,7.66,6.272,7.661-1.568,7.661-6.272S13.4,0,7.66,0Z"
          fill="none"
          stroke={color}
          strokeLinecap="round"
          strokeLinejoin="round"
          strokeMiterlimit="10"
          strokeWidth={1.5}
          transform="translate(0.75 6.824)"
        />
      </g>
    </svg>
  );
};

export const Activity = ({fill, size, height, width, ...props}) => {
  return (
    <svg
      height={size || height || 24}
      viewBox="0 0 24 24"
      width={size || width || 24}
      xmlns="http://www.w3.org/2000/svg"
      {...props}
    >
      <g
        fill="none"
        stroke={fill}
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeMiterlimit={10}
        strokeWidth={1.5}
      >
        <path d="M6.918 14.854l2.993-3.889 3.414 2.68 2.929-3.78" />
        <path d="M19.668 2.35a1.922 1.922 0 11-1.922 1.922 1.921 1.921 0 011.922-1.922z" />
        <path d="M20.756 9.269a20.809 20.809 0 01.194 3.034c0 6.938-2.312 9.25-9.25 9.25s-9.25-2.312-9.25-9.25 2.313-9.25 9.25-9.25a20.931 20.931 0 012.983.187" />
      </g>
    </svg>
  );
};

export const Flash = ({fill = "currentColor", size, height, width, ...props}) => {
  return (
    <svg
      fill="none"
      height={size || height}
      viewBox="0 0 24 24"
      width={size || width}
      xmlns="http://www.w3.org/2000/svg"
      {...props}
    >
      <path
        d="M6.09 13.28h3.09v7.2c0 1.68.91 2.02 2.02.76l7.57-8.6c.93-1.05.54-1.92-.87-1.92h-3.09v-7.2c0-1.68-.91-2.02-2.02-.76l-7.57 8.6c-.92 1.06-.53 1.92.87 1.92Z"
        stroke={fill}
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeMiterlimit={10}
        strokeWidth={1.5}
      />
    </svg>
  );
};

export const Server = ({fill = "currentColor", size, height, width, ...props}) => {
  return (
    <svg
      fill="none"
      height={size || height}
      viewBox="0 0 24 24"
      width={size || width}
      xmlns="http://www.w3.org/2000/svg"
      {...props}
    >
      <path
        d="M19.32 10H4.69c-1.48 0-2.68-1.21-2.68-2.68V4.69c0-1.48 1.21-2.68 2.68-2.68h14.63C20.8 2.01 22 3.22 22 4.69v2.63C22 8.79 20.79 10 19.32 10ZM19.32 22H4.69c-1.48 0-2.68-1.21-2.68-2.68v-2.63c0-1.48 1.21-2.68 2.68-2.68h14.63c1.48 0 2.68 1.21 2.68 2.68v2.63c0 1.47-1.21 2.68-2.68 2.68ZM6 5v2M10 5v2M6 17v2M10 17v2M14 6h4M14 18h4"
        stroke={fill}
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={1.5}
      />
    </svg>
  );
};

export const TagUser = ({fill = "currentColor", size, height, width, ...props}) => {
  return (
    <svg
      fill="none"
      height={size || height}
      viewBox="0 0 24 24"
      width={size || width}
      xmlns="http://www.w3.org/2000/svg"
      {...props}
    >
      <path
        d="M18 18.86h-.76c-.8 0-1.56.31-2.12.87l-1.71 1.69c-.78.77-2.05.77-2.83 0l-1.71-1.69c-.56-.56-1.33-.87-2.12-.87H6c-1.66 0-3-1.33-3-2.97V4.98c0-1.64 1.34-2.97 3-2.97h12c1.66 0 3 1.33 3 2.97v10.91c0 1.63-1.34 2.97-3 2.97Z"
        stroke={fill}
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeMiterlimit={10}
        strokeWidth={1.5}
      />
      <path
        d="M12 10a2.33 2.33 0 1 0 0-4.66A2.33 2.33 0 0 0 12 10ZM16 15.66c0-1.8-1.79-3.26-4-3.26s-4 1.46-4 3.26"
        stroke={fill}
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={1.5}
      />
    </svg>
  );
};

export const Scale = ({fill = "currentColor", size, height, width, ...props}) => {
  return (
    <svg
      fill="none"
      height={size || height}
      viewBox="0 0 24 24"
      width={size || width}
      xmlns="http://www.w3.org/2000/svg"
      {...props}
    >
      <path
        d="M9 22h6c5 0 7-2 7-7V9c0-5-2-7-7-7H9C4 2 2 4 2 9v6c0 5 2 7 7 7ZM18 6 6 18"
        stroke={fill}
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={1.5}
      />
      <path
        d="M18 10V6h-4M6 14v4h4"
        stroke={fill}
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={1.5}
      />
    </svg>
  );
};

export const Coffee = ({fill = "currentColor", size, height, width, ...props}) => {
    return (
        <svg height={size || height}
        viewBox="0 0 24 24"
        width={size || width} fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.6" d="M17.79 10.47V12H2V10.47C2 8.15001 3.89 6.26001 6.21 6.26001H13.58C15.9 6.26001 17.79 8.15001 17.79 10.47Z" fill={fill} ></path> <path opacity="0.4" d="M17.79 12V17.79C17.79 20.11 15.9 22 13.58 22H6.21C3.89 22 2 20.11 2 17.79V12H17.79Z" fill={fill} ></path> <path d="M5.5 5.12012C5.09 5.12012 4.75 4.78012 4.75 4.37012V2.62012C4.75 2.21012 5.09 1.87012 5.5 1.87012C5.91 1.87012 6.25 2.21012 6.25 2.62012V4.37012C6.25 4.79012 5.91 5.12012 5.5 5.12012Z" fill={fill} ></path> <path d="M9.5 5.12012C9.09 5.12012 8.75 4.78012 8.75 4.37012V2.62012C8.75 2.21012 9.09 1.87012 9.5 1.87012C9.91 1.87012 10.25 2.21012 10.25 2.62012V4.37012C10.25 4.79012 9.91 5.12012 9.5 5.12012Z" fill={fill} ></path> <path d="M13.5 5.12012C13.09 5.12012 12.75 4.78012 12.75 4.37012V2.62012C12.75 2.21012 13.09 1.87012 13.5 1.87012C13.91 1.87012 14.25 2.21012 14.25 2.62012V4.37012C14.25 4.79012 13.91 5.12012 13.5 5.12012Z" fill={fill} ></path> <path d="M21.6498 14.3199C21.6498 16.4699 19.9098 18.2099 17.7598 18.2099V10.4199C19.8998 10.4199 21.6498 12.1699 21.6498 14.3199Z" fill={fill} ></path> </g></svg>
    )
}


export const Drinks = ({fill = "currentColor", size, height, width, ...props}) => {
    return (
        <svg height={size || height}
        viewBox="0 0 24 24"
        width={size || width} fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.8153 2H9.18576C7.34797 2 6.42908 2 5.70634 2.44432C5.58164 2.52098 5.46272 2.60666 5.35053 2.70069C4.70028 3.24563 4.40942 4.11727 3.8277 5.86056L3.79188 5.96791C3.47312 6.92318 3.31374 7.40081 3.48212 7.76195C3.53526 7.87592 3.60942 7.97884 3.70071 8.06533C3.98998 8.33937 4.4935 8.33937 5.50055 8.33937H18.5006C19.5076 8.33937 20.0111 8.33937 20.3004 8.06533C20.3917 7.97884 20.4658 7.87592 20.519 7.76195C20.6874 7.40081 20.528 6.92318 20.2092 5.96791L20.1734 5.86056L20.1734 5.8605C19.5917 4.11727 19.3008 3.24562 18.6506 2.70069C18.5384 2.60666 18.4195 2.52098 18.2948 2.44432C17.572 2 16.6531 2 14.8153 2Z" fill={fill}></path> <path opacity="0.5" d="M10.958 22H13.044C14.6926 22 15.517 22 16.0802 21.5132C16.6435 21.0264 16.7629 20.2107 17.0018 18.5794L18.501 8.33936H5.50098L7.00019 18.5794C7.23902 20.2107 7.35843 21.0264 7.92171 21.5132C8.48499 22 9.30932 22 10.958 22Z" fill={fill}></path> <path d="M6.76914 17H17.2332L17.9652 12H6.03711L6.76914 17Z" fill={fill}></path> </g></svg>
    )
}
export const Pie = ({fill = "currentColor", size, height, width, ...props}) => {
    return (
        <svg height={size || height}
        viewBox="0 0 24 24"
        width={size || width} fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.5" d="M6.22209 4.60105C6.66665 4.304 7.13344 4.04636 7.6171 3.82976C8.98898 3.21539 9.67491 2.9082 10.5875 3.4994C11.5 4.09061 11.5 5.06041 11.5 7.00001V8.50001C11.5 10.3856 11.5 11.3284 12.0858 11.9142C12.6716 12.5 13.6144 12.5 15.5 12.5H17C18.9396 12.5 19.9094 12.5 20.5006 13.4125C21.0918 14.3251 20.7846 15.011 20.1702 16.3829C19.9536 16.8666 19.696 17.3334 19.399 17.7779C18.3551 19.3402 16.8714 20.5578 15.1355 21.2769C13.3996 21.9959 11.4895 22.184 9.64665 21.8175C7.80383 21.4509 6.11109 20.5461 4.78249 19.2175C3.45389 17.8889 2.5491 16.1962 2.18254 14.3534C1.81598 12.5105 2.00412 10.6004 2.72315 8.86451C3.44218 7.12861 4.65982 5.64492 6.22209 4.60105Z" fill={fill}></path> <path d="M21.446 7.06901C20.6342 5.00831 18.9917 3.36579 16.931 2.55398C15.3895 1.94669 14 3.34316 14 5.00002V9.00002C14 9.5523 14.4477 10 15 10H19C20.6569 10 22.0533 8.61055 21.446 7.06901Z" fill={fill}></path> </g></svg>
    )
}
export const Rice = ({fill = "currentColor", size, height, width, ...props}) => {
    return (
        <svg height={size || height}
        width={size || width} fill={fill} version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 463.817 463.817" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <polygon points="128.333,168.868 135.102,200.243 157.095,183.966 146.507,174.432 "></polygon> <path d="M463.704,222.173c-2.286-8.346-17.073-16.156-42.492-22.516l-9.012-38.119l-58.427-83.057L231.136,27.628l-61.234,34.553 l-30.771,39.605L76.574,112.6l-46.645,89.855c-18.332,5.646-27.768,12.783-29.665,19.717c0,0-0.327,1.299-0.253,2.646 c0.801,74.245,35.159,140.254,88.343,183.057h-8.601v28.314h304.459v-28.314h-8.599c53.185-42.803,87.401-108.813,88.202-183.059 C463.83,224.638,463.704,222.173,463.704,222.173z M380.28,238.595c-41.113,6.375-93.779,9.886-148.296,9.886 c-54.518,0-107.184-3.511-148.299-9.886c-32.28-5.006-49.564-10.469-58.536-14.313c7.554-3.242,21.005-7.625,44.337-11.92 l-10.857-8.662l34.732-68.357l47.002-8.125l48.099,26.174l1.914,1.041l1.04-0.037l62.008-2.092l-59.122-9.406l-33.175-27.373 l25.74-33.9l45.965-25.938l104.491,43.328l51.454,73.148l5.385,22.146l-12.116,15.934c31.143,4.93,47.969,10.26,56.773,14.039 C429.848,228.126,412.561,233.589,380.28,238.595z"></path> <polygon points="299.366,154.981 288.645,170.68 320.615,173.55 311.617,147.71 "></polygon> <polygon points="246.532,208.364 259.93,223.405 273.62,208.364 260.077,202.743 "></polygon> <polygon points="225.307,103.577 239.965,103.214 250.059,92.577 231.706,84.272 "></polygon> </g> </g> </g></svg>
    )
}
export const Bread = ({fill = "currentColor", size, height, width, ...props}) => {
    return (
        <svg height={size || height}
        width={size || width} fill={fill} version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 404.035 404.035" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M378.617,298.857V161.773c15.195-14.174,24.002-34.104,24.002-55.205V75.5c0-41.631-33.869-75.5-75.5-75.5H182.095 c-12.522,0-24.342,3.064-34.749,8.482L19.88,131.261C8.382,144.513,1.416,161.798,1.416,180.678v31.068 c0,21.102,8.808,41.029,24.002,55.205v137.084h248.021 M256.441,211.747c0,11.399-5.635,22.056-15.071,28.508l-8.931,6.104v116.678 H66.418V246.359l-8.931-6.104c-9.437-6.452-15.071-17.108-15.071-28.508v-31.069c0-19.023,15.476-34.5,34.5-34.5h145.025 c19.023,0,34.5,15.477,34.5,34.5V211.747z"></path> </g> </g></svg>
    )
}
export const Snack = ({fill = "currentColor", size, height, width, ...props}) => {
    return (
        <svg height={size || height}
        viewBox="0 0 24 24"
        width={size || width} fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.5" d="M12 2C6.47715 2 2 6.47715 2 12C2 12.3539 2.01839 12.7036 2.05426 13.048C2.40307 13.3523 4.367 15 6 15C7.21199 15 8.60628 14.0924 9.38725 13.5L9.39619 13.4911C9.14413 13.0518 9 12.5427 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12C15 12.8851 14.6167 13.6807 14.007 14.2298C14.4774 14.6425 15.0911 15 15.8053 15C17.4948 15 17.4948 13 19.1842 13C20.2618 13 21.1102 13.8136 21.5835 14.4029L21.6758 14.5353C21.8874 13.7256 22 12.876 22 12C22 6.47715 17.5228 2 12 2Z" fill={fill}></path> <path d="M9.38768 13.5C8.60671 14.0924 7.21242 15 6.00043 15C4.36743 15 2.4035 13.3523 2.05469 13.048C2.57857 18.0783 6.83152 22 12.0004 22C16.6473 22 20.5539 18.8304 21.6762 14.5353L21.5839 14.4029C21.1107 13.8136 20.2622 13 19.1847 13C17.4952 13 17.4952 15 15.8058 15C15.0915 15 14.4779 14.6425 14.0075 14.2298C13.4759 14.7086 12.7722 15 12.0004 15C10.8863 15 9.91405 14.3927 9.39662 13.4911L9.38768 13.5Z" fill={fill}></path> <path d="M19.5281 5.41717C19.5081 5.43348 19.4886 5.45098 19.4699 5.46967L18.4699 6.46967C18.177 6.76256 18.177 7.23744 18.4699 7.53033C18.7628 7.82322 19.2377 7.82322 19.5306 7.53033L20.435 6.62594C20.163 6.19995 19.8596 5.79594 19.5281 5.41717Z" fill={fill}></path> <path d="M5.41741 4.47212C5.43372 4.4922 5.45122 4.51164 5.46992 4.53033L6.46992 5.53033C6.76281 5.82322 7.23768 5.82322 7.53058 5.53033C7.82347 5.23744 7.82347 4.76256 7.53058 4.46967L6.62619 3.56528C6.2002 3.83726 5.79618 4.14062 5.41741 4.47212Z" fill={fill}></path> <path d="M10.4699 4.53033C10.177 4.23744 10.177 3.76256 10.4699 3.46967C10.7628 3.17678 11.2377 3.17678 11.5306 3.46967L12.5306 4.46967C12.8235 4.76256 12.8235 5.23744 12.5306 5.53033C12.2377 5.82322 11.7628 5.82322 11.4699 5.53033L10.4699 4.53033Z" fill={fill}></path> <path d="M16.6002 5.45C16.8488 5.11863 16.7816 4.64853 16.4502 4.4C16.1189 4.15147 15.6488 4.21863 15.4002 4.55L13.9002 6.55C13.6517 6.88137 13.7189 7.35147 14.0502 7.6C14.3816 7.84853 14.8517 7.78137 15.1002 7.45L16.6002 5.45Z" fill={fill}></path> <path d="M8.40978 7.56014C8.51698 7.96024 8.92824 8.19768 9.32834 8.09047L10.6944 7.72444C11.0945 7.61724 11.3319 7.20599 11.2247 6.80589C11.1175 6.40579 10.7062 6.16835 10.3061 6.27556L8.94011 6.64158C8.54001 6.74879 8.30257 7.16004 8.40978 7.56014Z" fill={fill}></path> <path d="M17.4655 10.354C17.485 10.7678 17.1653 11.119 16.7516 11.1384C16.3378 11.1579 15.9866 10.8382 15.9672 10.4245L15.9008 9.01181C15.8814 8.59806 16.201 8.24688 16.6148 8.22743C17.0285 8.20799 17.3797 8.52764 17.3992 8.94139L17.4655 10.354Z" fill={fill}></path> <path d="M18.437 12.0586C18.7108 12.3694 19.1847 12.3995 19.4956 12.1257L21.1736 10.6479C21.4845 10.3741 21.5146 9.90018 21.2408 9.58933C20.967 9.27848 20.4931 9.24841 20.1823 9.52217L18.5042 11C18.1934 11.2738 18.1633 11.7477 18.437 12.0586Z" fill={fill}></path> <path d="M5.5247 8.16677C5.35329 7.78969 5.52002 7.34505 5.8971 7.17364C6.27419 7.00223 6.71883 7.16896 6.89024 7.54605L7.47546 8.83349C7.64687 9.21058 7.48014 9.65522 7.10306 9.82662C6.72597 9.99803 6.28133 9.8313 6.10992 9.45422L5.5247 8.16677Z" fill={fill}></path> <path d="M6.9432 10.895C7.27745 11.1397 7.3501 11.6089 7.10547 11.9432L6.27024 13.0844C6.0256 13.4187 5.55632 13.4913 5.22206 13.2467C4.88781 13.0021 4.81516 12.5328 5.05979 12.1985L5.89502 11.0573C6.13966 10.723 6.60894 10.6504 6.9432 10.895Z" fill={fill}></path> <path d="M2.85567 8.97928C2.83263 8.56571 3.14922 8.21177 3.5628 8.18873C3.97637 8.16569 4.33031 8.48228 4.35335 8.89585L4.43201 10.3079C4.45505 10.7214 4.13846 11.0754 3.72489 11.0984C3.31132 11.1215 2.95738 10.8049 2.93434 10.3913L2.85567 8.97928Z" fill={fill}></path> </g></svg>
    )
}