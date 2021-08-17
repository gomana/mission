## 개요
- API 서비스들을 docker 관리하며 서로 다른 웹개발 프레임워크로 교체 가능하게 함
- jwt 인증 방식으로 활용하여 일반적으로 인증 정보가 저장되는 서버의 세션 부담을 줄이기
- web-front에서 다른 도메인의 api 호출시 cors 문제 해결
- 로컬에서 API 개발 환경 구성하기
    - 소규모 real 서비스로 진행시 현재 구성방식으로도 적용 가능
    - 대규모 real 서비스로 전환시에는 대용량 트래픽, 과부하의 제약 사항들을 고려하여 시스템 구성해야됨

## 시스템 구성
- docker compose 기반으로 API 서비스들을 포트별로 분리하여 구성
    - docker-compose.yml
    - API 서비스별로 다른 웹개발 프래임워크로 교체 가능
- nginx의 reverse proxy을 이용하여 API 도메인별로 요청들어온 80포트를 각각 다른 API 서비스의 포트로 연결시킴
    - proxy/nginx.conf에서 reverse proxy 설정
- domain 구성
    - 로컬 컴퓨터에서 테스트시 hosts 파일 수정필요
        - 127.0.0.1 api-fruit.gom.com   
        - 127.0.0.1 api-vegetable.gom.com   
        - 127.0.0.1 web-front.gom.com  
- db는 mysql로 설정
    - mysql 1개이며 각 API 서비스들이 접근하여 데이터 조회
    - TB_PRODUCT 테이블에 상품들 데이터 저장

## 기술스택
- docker-compose, docker
- codeigniter 3  
- mysql
- jwt

## API 구성
- jwt 방식
    - codeigniter의 hook를 이용하여 header의 Authorization 체크
        - api의 담당 메서드가 호출 되기 전에 실행하여 토근 인증 처리
        - api프로젝트/src/applications/api/hooks/Authority.php에서 처리
- api-fruit.gom.com
    - /token
        - 과일 accessToken 생성
        - jwt 방식. 대칭 알고리즘.
        - jwt 비밀키
            - api프로젝트/src/applications/api/config/constants.php에서 설정됨
        - json 형식으로 응답
    - /product
        - 상품 목록 조회
        - header의 Authorization로 토큰 필수
    - /product?name=상품명
        - 상품별 가격 조회
        - header의 Authorization로 토큰 필수
- api-vegetable.gom.com
    - /token
        - 채소 accessToken 생성
        - jwt 방식. 대칭 알고리즘.
        - jwt 비밀키
            - api프로젝트/src/applications/api/config/constants.php에서 설정됨
        - response header에서 set-cookie로 설정
    - /product
        - 상품 목록 조회
        - header의 Authorization로 토큰 필수
    - /product?name=상품명
        - 상품별 가격 조회
        - header의 Authorization로 토큰 필수

## API 화면
- 로컬 실행
![api_front](https://user-images.githubusercontent.com/939827/129808365-96ef9338-b26d-4c23-9269-60afc7f50a4c.PNG)
![api_front2](https://user-images.githubusercontent.com/939827/129808816-80deb3d2-57a0-4da7-b6b0-71f22ff65ad8.PNG)

## 향후 과제
 - aws cache redis 적용하여 토큰 관리
 - aws docker 배포 방식 적용해 보기
 - docker compose에 다른 서비스들을 적용해 보기