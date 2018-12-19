package br.com.victorblq.infrastructure.configuration;

import org.springframework.context.annotation.Configuration;
import org.springframework.web.servlet.config.annotation.CorsRegistry;
import org.springframework.web.servlet.config.annotation.ResourceHandlerRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;

/**
 * 
 * @author victor.blosquievis
 *
 * @version 1.0.0
 * @since 1.0.0, 12/19/2018
 */
@Configuration
public class WebConfiguration implements WebMvcConfigurer {

    /**
     *
     */
    @Override
    public void addResourceHandlers(ResourceHandlerRegistry registry) {
        registry.addResourceHandler("/**")
                .addResourceLocations("classpath:/META-INF/resources/inventario-web/");

        registry.addResourceHandler("/assets/**")
                .addResourceLocations("classpath:/META-INF/resources/assets/");
    }

    /**
     *
     */
    @Override
    public void addCorsMappings(CorsRegistry registry) {
        registry.addMapping("/**")
                .allowedMethods("HEAD", "GET", "PUT", "POST", "DELETE", "PATCH", "OPTIONS");
    }
    
}

