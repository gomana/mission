## 시스템 구성
- docker compose 기반으로 API 서버들을 포트별로 분리하여 구성
    - docker-compose.yml
- nginx의 reverse proxy을 이용하여 API 도메인별로 요청들어온 80포트를 각각 다른 API 서비스의 포트로 연결시킴
    - proxy/nginx.conf에서 reverse proxy 설정
- domain 구성
    - 로컬 컴퓨터에서 테스트시 hosts 파일 수정필요
        127.0.0.1 api-fruit.gom.com   
        127.0.0.1 api-vegetable.gom.com   
        127.0.0.1 web-front.gom.com   
## 기술스택
docker compose  
codeigniter 3  
mysql

## 도메인
- 